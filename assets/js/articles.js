// Artikel — homepage latest articles + artikel.html listing/detail.
(function () {
  const root = document.documentElement;

  function resolveApiBase() {
    if (window.KOL_ARTICLES_API_BASE) {
      return String(window.KOL_ARTICLES_API_BASE).replace(/\/$/, '');
    }

    const configured = String(root.dataset.apiBase || '/campaigns').replace(/\/$/, '');

    // Local Laragon serves the landing page under /KOL-landing-page and the
    // KOL System under /kol-system, while production uses /campaigns.
    if (configured === '/campaigns' && /\/KOL-landing-page(\/|$)/i.test(location.pathname)) {
      return '/kol-system';
    }

    if (configured === '/campaigns' && location.port === '8087') {
      return 'http://localhost/kol-system';
    }

    return configured;
  }

  const API_BASE = resolveApiBase();
  const API = API_BASE + '/articles/feed';

  const state = {
    page: 1,
    category: '',
    perPage: 9,
    totalPages: 0
  };

  const $ = (selector, scope = document) => scope.querySelector(selector);

  function escapeHtml(value) {
    return String(value == null ? '' : value)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  function usePrettyUrls() {
    return location.protocol !== 'file:' && location.port !== '8087';
  }

  function articleHref(article) {
    const slug = encodeURIComponent(article.slug);
    return usePrettyUrls() ? '/artikel/' + slug : 'artikel.html?slug=' + slug;
  }

  function fetchJson(url) {
    const separator = url.indexOf('?') === -1 ? '?' : '&';

    return fetch(url + separator + '_=' + Date.now(), {
      headers: { Accept: 'application/json' },
      credentials: 'omit',
      cache: 'no-store'
    }).then(function (response) {
      if (!response.ok) {
        const error = new Error('Request failed with status ' + response.status);
        error.status = response.status;
        throw error;
      }

      return response.json();
    });
  }

  function skeletonCards(count) {
    let html = '';

    for (let i = 0; i < count; i++) {
      html +=
        '<div class="overflow-hidden rounded-2xl bg-white shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">' +
          '<div class="aspect-[16/9] animate-pulse bg-slate-100"></div>' +
          '<div class="flex flex-1 flex-col p-6 sm:p-8">' +
            '<div class="h-2.5 w-20 animate-pulse rounded bg-slate-100"></div>' +
            '<div class="mt-3 h-5 w-4/5 animate-pulse rounded bg-slate-100"></div>' +
            '<div class="mt-3 h-3 w-full animate-pulse rounded bg-slate-100"></div>' +
            '<div class="mt-2 h-3 w-2/3 animate-pulse rounded bg-slate-100"></div>' +
            '<div class="mt-auto pt-6"><div class="h-3 w-full animate-pulse rounded bg-slate-100"></div></div>' +
          '</div>' +
        '</div>';
    }

    return html;
  }

  function emptyMarkup(message) {
    return '<div class="col-span-full mx-auto w-full max-w-[768px] rounded-2xl bg-white px-6 py-16 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">' +
      '<div class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-[#dbe1ff] text-brand">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5V5a2 2 0 0 1 2-2h13v18H6a2 2 0 0 1-2-2Z"/><path d="M8 7h7M8 11h7M8 15h4"/></svg>' +
      '</div>' +
      '<h3 class="mt-5 font-display text-xl font-bold leading-7 tracking-[-0.01em] text-ink">Belum ada artikel</h3>' +
      '<p class="mx-auto mt-2 max-w-[420px] text-sm leading-[22.75px] text-body">' + escapeHtml(message) + '</p>' +
    '</div>';
  }

  function errorMarkup(message) {
    return '<div class="col-span-full mx-auto w-full max-w-[768px] rounded-2xl bg-white px-6 py-12 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">' +
      '<div class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-red-50 text-red-600">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg>' +
      '</div>' +
      '<h3 class="mt-5 font-display text-xl font-bold leading-7 tracking-[-0.01em] text-ink">Gagal memuat artikel</h3>' +
      '<p class="mx-auto mt-2 max-w-[420px] text-sm leading-[22.75px] text-body">' + escapeHtml(message) + '</p>' +
      '<button type="button" class="mt-5 inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand" onclick="window.location.reload()">Coba lagi</button>' +
    '</div>';
  }

  function coverMarkup(article, className) {
    if (article.cover_image_url) {
      return '<img src="' + escapeHtml(article.cover_image_url) + '" alt="' + escapeHtml(article.title) + '" loading="lazy" class="' + className + '">';
    }

    return '<div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#dbe1ff] via-[#eff4ff] to-[#d3e4fe]">' +
      '<img src="/assets/images/kolab-logo.png" alt="" class="h-10 opacity-80">' +
    '</div>';
  }

  function card(article) {
    const href = articleHref(article);

    return '<article class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)] transition duration-300 hover:-translate-y-1 hover:shadow-[0px_18px_30px_-12px_rgba(23,43,77,0.25)]">' +
      '<a href="' + escapeHtml(href) + '" class="block aspect-[16/9] overflow-hidden bg-mist" aria-label="' + escapeHtml(article.title) + '">' +
        coverMarkup(article, 'h-full w-full object-cover transition duration-500 group-hover:scale-105') +
      '</a>' +
      '<div class="flex flex-1 flex-col p-6 sm:p-8">' +
        '<span class="text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">' + escapeHtml(article.category || 'Artikel') + '</span>' +
        '<h3 class="mt-3 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">' +
          '<a href="' + escapeHtml(href) + '" class="transition hover:text-brand">' + escapeHtml(article.title) + '</a>' +
        '</h3>' +
        '<p class="mt-2 line-clamp-3 text-base leading-[26px] tracking-[-0.005em] text-body">' + escapeHtml(article.excerpt || '') + '</p>' +
        '<div class="mt-auto pt-6">' +
          '<div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-2 border-t border-[rgba(195,198,215,0.3)] pt-4 text-[11px] font-semibold uppercase leading-[14px] tracking-[0.44px]">' +
            '<span class="text-brand">' + escapeHtml(article.author) + '</span>' +
            '<span class="text-[#565e74]">' + escapeHtml(article.published_at_label) + ' &middot; ' + Number(article.reading_time || 1) + ' menit</span>' +
          '</div>' +
        '</div>' +
      '</div>' +
    '</article>';
  }

  function initHome() {
    const container = $('#latest-articles');
    if (!container) return;

    container.innerHTML = skeletonCards(3);

    fetchJson(API + '?limit=3')
      .then(function (response) {
        if (!response.success || !response.data.length) {
          container.innerHTML = emptyMarkup('Artikel baru akan segera hadir. Silakan kembali lagi nanti.');
          return;
        }

        container.innerHTML = response.data.map(card).join('');
      })
      .catch(function () {
        container.innerHTML = errorMarkup('Gagal memuat artikel. Silakan coba lagi.');
      });
  }

  function initArticlePage() {
    const listView = $('#articles-list-view');
    if (!listView) return;

    const params = new URLSearchParams(location.search);
    const slug = params.get('slug') || slugFromPath();

    if (slug) {
      showDetail(slug);
    } else {
      const initialPage = parseInt(params.get('page'), 10);

      state.category = params.get('category') || '';
      state.page = initialPage > 0 ? initialPage : 1;
      showList();
    }
  }

  function slugFromPath() {
    const parts = location.pathname.split('/').filter(Boolean);
    const index = parts.indexOf('artikel');

    if (index !== -1 && parts[index + 1]) {
      return decodeURIComponent(parts[index + 1]);
    }

    return '';
  }

  function showList() {
    const hero = $('#articles-hero');
    const content = $('#articles-content');

    if (hero) hero.classList.remove('hidden');
    if (content) {
      content.classList.remove('bg-white');
      content.classList.add('bg-mist');
    }

    $('#articles-list-view').classList.remove('hidden');
    $('#article-detail-view').classList.add('hidden');
    loadList();
  }

  function showDetail(slug) {
    const hero = $('#articles-hero');
    const content = $('#articles-content');

    if (hero) hero.classList.add('hidden');
    if (content) {
      content.classList.remove('bg-mist');
      content.classList.add('bg-white');
    }

    $('#articles-list-view').classList.add('hidden');
    $('#article-detail-view').classList.remove('hidden');

    const detail = $('#article-detail');
    detail.innerHTML = '<div class="mx-auto max-w-3xl">' + skeletonCards(1) + '</div>';

    fetchJson(API + '/' + encodeURIComponent(slug))
      .then(function (response) {
        if (!response.success) {
          throw new Error('not-found');
        }

        renderDetail(response.data);
      })
      .catch(function (error) {
        detail.innerHTML = '<div class="mx-auto max-w-3xl">' + errorMarkup(error.status === 404 ? 'Artikel tidak ditemukan.' : 'Gagal memuat artikel. Silakan coba lagi.') + '</div>';
      });
  }

  function renderDetail(article) {
    const detail = $('#article-detail');
    const tags = (article.tags || []).map(function (tag) {
      return '<span class="rounded-full bg-[#e5eeff] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.44px] text-brand">' + escapeHtml(tag) + '</span>';
    }).join('');

    detail.innerHTML =
      '<div class="mx-auto max-w-3xl">' +
        '<div class="flex flex-wrap items-center gap-2">' +
          (article.category
            ? '<span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">' + escapeHtml(article.category) + '</span>'
            : '') +
        '</div>' +
        '<h1 class="mt-5 font-display text-3xl font-extrabold leading-[1.2] tracking-[-0.03em] text-ink sm:text-[44px] sm:leading-[1.15]">' + escapeHtml(article.title) + '</h1>' +
        '<div class="mt-6 flex flex-wrap items-center gap-x-3 gap-y-2 border-y border-[rgba(195,198,215,0.3)] py-4 text-sm text-[#737686]">' +
          '<span class="font-semibold text-body">' + escapeHtml(article.author) + '</span>' +
          '<span aria-hidden="true">&middot;</span>' +
          '<time datetime="' + escapeHtml(article.published_at) + '">' + escapeHtml(article.published_at_label) + '</time>' +
          '<span aria-hidden="true">&middot;</span>' +
          '<span>' + Number(article.reading_time || 1) + ' menit baca</span>' +
        '</div>' +
        (article.cover_image_url
          ? '<div class="mt-8 overflow-hidden rounded-2xl bg-mist shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">' +
              '<img src="' + escapeHtml(article.cover_image_url) + '" alt="' + escapeHtml(article.title) + '" class="h-auto w-full object-cover">' +
            '</div>'
          : '') +
        (article.excerpt
          ? '<p class="mt-8 border-l-4 border-brand/30 pl-5 text-lg font-medium leading-8 text-body">' + escapeHtml(article.excerpt) + '</p>'
          : '') +
        '<div class="article-content mt-8">' + article.content + '</div>' +
        (tags ? '<div class="mt-10 flex flex-wrap gap-2 border-t border-[rgba(195,198,215,0.3)] pt-6">' + tags + '</div>' : '') +
      '</div>';

    updateDocumentMeta(article);
    loadRelated(article);
  }

  function loadRelated(article) {
    const wrap = $('#related-articles-wrap');
    const container = $('#related-articles');
    if (!wrap || !container) return;

    fetchJson(API + '?limit=4')
      .then(function (response) {
        const related = (response.data || []).filter(function (item) {
          return item.slug !== article.slug;
        }).slice(0, 3);

        if (!related.length) {
          wrap.classList.add('hidden');
          return;
        }

        container.innerHTML = related.map(card).join('');
        wrap.classList.remove('hidden');
      })
      .catch(function () {
        wrap.classList.add('hidden');
      });
  }

  function updateDocumentMeta(article) {
    const title = article.meta_title || article.title;
    document.title = title + ' — KOLAB.ID';

    setMeta('description', article.meta_description || article.excerpt || '');
    setMeta('og:title', title, 'property');
    setMeta('og:description', article.meta_description || article.excerpt || '', 'property');
    setMeta('og:type', 'article', 'property');
    setMeta('og:url', location.href, 'property');

    if (article.cover_image_url) {
      setMeta('og:image', article.cover_image_url, 'property');
    }

    let canonical = document.head.querySelector('link[rel="canonical"]');
    if (!canonical) {
      canonical = document.createElement('link');
      canonical.setAttribute('rel', 'canonical');
      document.head.appendChild(canonical);
    }
    canonical.setAttribute('href', location.href);

    const existing = document.head.querySelector('script[data-article-jsonld]');
    if (existing) existing.remove();

    const schema = document.createElement('script');
    schema.type = 'application/ld+json';
    schema.setAttribute('data-article-jsonld', 'true');
    schema.textContent = JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'Article',
      headline: article.title,
      description: article.meta_description || article.excerpt || '',
      image: article.cover_image_url ? [article.cover_image_url] : undefined,
      datePublished: article.published_at,
      author: { '@type': 'Person', name: article.author },
      publisher: {
        '@type': 'Organization',
        name: 'KOLAB.ID',
        logo: { '@type': 'ImageObject', url: location.origin + '/assets/images/kolab-logo.png' }
      },
      mainEntityOfPage: location.href
    });

    document.head.appendChild(schema);
  }

  function setMeta(name, content, attribute) {
    const key = attribute || 'name';
    let element = document.head.querySelector('meta[' + key + '="' + name + '"]');

    if (!element) {
      element = document.createElement('meta');
      element.setAttribute(key, name);
      document.head.appendChild(element);
    }

    element.setAttribute('content', content || '');
  }

  function loadList() {
    const list = $('#articles-list');
    const empty = $('#articles-empty');
    const error = $('#articles-error');
    const pagination = $('#articles-pagination');

    if (!list) return;

    error.classList.add('hidden');
    error.style.display = 'none';
    empty.classList.add('hidden');
    empty.style.display = 'none';
    list.classList.remove('hidden');
    list.style.display = '';
    list.innerHTML = skeletonCards(state.perPage);

    const params = new URLSearchParams({
      limit: String(state.perPage),
      page: String(state.page)
    });

    if (state.category) {
      params.set('category', state.category);
    }

    fetchJson(API + '?' + params.toString())
      .then(function (response) {
        if (!response.success) {
          throw new Error('failed');
        }

        state.totalPages = response.meta.total_pages;

        renderCategories(response.meta.categories || []);
        renderPagination(response.meta);

        if (!response.data.length) {
          list.innerHTML = '';
          list.classList.add('hidden');
          list.style.display = 'none';
          empty.innerHTML = emptyMarkup(state.category
            ? 'Belum ada artikel pada kategori ini. Coba pilih topik lain.'
            : 'Artikel baru akan segera hadir. Silakan kembali lagi nanti.');
          empty.classList.remove('hidden');
          empty.style.display = '';
          pagination.classList.add('hidden');
          pagination.style.display = 'none';
          updateListUrl();
          return;
        }

        list.innerHTML = response.data.map(card).join('');
        updateListUrl();
      })
      .catch(function () {
        list.innerHTML = '';
        list.classList.add('hidden');
        list.style.display = 'none';
        pagination.classList.add('hidden');
        pagination.style.display = 'none';
        error.innerHTML = errorMarkup('Gagal memuat artikel. Silakan coba lagi.');
        error.classList.remove('hidden');
        error.style.display = '';
      });
  }

  function renderCategories(categories) {
    const container = $('#article-categories');
    if (!container) return;

    const items = [{ label: 'Semua', value: '' }].concat(categories.map(function (category) {
      return { label: category, value: category };
    }));

    container.innerHTML = items.map(function (item) {
      const active = item.value === state.category;
      const classes = active
        ? 'rounded-full bg-brand px-4 py-2 text-xs font-semibold text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.2),0px_4px_6px_-4px_rgba(37,99,235,0.2)]'
        : 'rounded-full bg-white px-4 py-2 text-xs font-semibold text-body shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] ring-1 ring-slate-200 transition hover:text-brand hover:ring-brand/30';

      return '<button type="button" class="' + classes + '" data-category="' + escapeHtml(item.value) + '">' + escapeHtml(item.label) + '</button>';
    }).join('');

    container.querySelectorAll('button[data-category]').forEach(function (button) {
      button.addEventListener('click', function () {
        state.category = this.getAttribute('data-category') || '';
        state.page = 1;
        loadList();
      });
    });
  }

  function renderPagination(meta) {
    const container = $('#articles-pagination');
    if (!container) return;

    if (!meta || meta.total_pages <= 1) {
      container.classList.add('hidden');
      container.style.display = 'none';
      container.innerHTML = '';
      return;
    }

    container.classList.remove('hidden');
    container.style.display = 'flex';
    container.innerHTML =
      '<button type="button" class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand disabled:pointer-events-none disabled:opacity-40" data-page="' + (meta.page - 1) + '" ' + (meta.page <= 1 ? 'disabled' : '') + '>Sebelumnya</button>' +
      '<span class="px-2 text-sm text-[#737686]">Halaman <strong class="font-semibold text-ink">' + meta.page + '</strong> dari ' + meta.total_pages + '</span>' +
      '<button type="button" class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand disabled:pointer-events-none disabled:opacity-40" data-page="' + (meta.page + 1) + '" ' + (meta.page >= meta.total_pages ? 'disabled' : '') + '>Berikutnya</button>';

    container.querySelectorAll('button[data-page]').forEach(function (button) {
      button.addEventListener('click', function () {
        const page = Number(this.getAttribute('data-page'));

        if (!page || page === state.page) return;

        state.page = page;
        loadList();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  }

  function updateListUrl() {
    if (location.pathname.indexOf('artikel.html') === -1 && location.pathname.indexOf('/artikel') === -1) {
      return;
    }

    if (location.search.indexOf('slug=') !== -1) {
      return;
    }

    const params = new URLSearchParams();

    if (state.category) params.set('category', state.category);
    if (state.page > 1) params.set('page', String(state.page));

    const query = params.toString();
    history.replaceState(null, '', location.pathname + (query ? '?' + query : ''));
  }

  function init() {
    initHome();
    initArticlePage();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
