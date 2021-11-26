const cacheName = 'v2';



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