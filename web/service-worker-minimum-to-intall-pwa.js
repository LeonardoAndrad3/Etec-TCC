/*const cacheName = 'cacheV1';

const resourcesToPrecache = [
    '/erro.html',
    '/css/style.css',
    '/icon/erro-conexao.png',
    '/icon/logo-2.png',
    '/js/main.js',
    '/js/jquery-3.1.1.min.js',
    '/js/script.js',
    '/manifest.js',
];

self.addEventListener('install', (event) => {
    event.waitUtil(
        caches.open(cacheName)
            .then(cache =>  (cache.addAll(resourcesToPrecache))),
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then(cacheResponse => (fetch(event.request) || cacheResponse)),
    );
});
*/
