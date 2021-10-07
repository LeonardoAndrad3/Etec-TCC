const cacheName = 'v2';

const cacheFiles = [
    '/',
    '/index.html',
    '/css/style.css',
    '/css/stylerr.css',
    '/icon/erro-conexao.png',
    '/icon/logo-2.png',
    '/js/main.js',
    '/js/jquery-3.1.1.min.js',
    '/js/script.js'
];

self.addEventListener('install', function(e){
    console.log("SW installed");

    e.waitUntil(
        caches.open(cacheName).then(function(cache){
            console.log("SW caching cacheFiles");
            return cache.addAll(cacheFiles);
        })
    )
})

self.addEventListener('activate', function(e){
    console.log("SW activated");

    e.waitUntil(

        caches.keys().then(function(cacheNameKey){
            if(cacheName !== cacheNameKey){
                console.log("SW removing cached files from ", cacheNameKey);
                return caches.delete(cacheNameKey);
            }
        })
    )
})

self.addEventListener('fetch', (e) => {
    console.log("SW fecthing");
    
    e.respondWith(
        caches.match(e.request)
            .then(cacheResponse => (cacheResponse || fetch(e.request))),
    );
});