self.addEventListener("install", e => {
    console.dir("service worker instalado! arquivo service");
});

self.addEventListener("fetch", e => {
    console.dir(e);
})