if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker-minimum-to-intall-pwa.js')
        .then(function(registration) {
            console.dir('Registration successful, scope is:', registration.scope);
        })
        .catch(function(error) {
            console.dir('Service worker registration failed (arquivo main), error:', error);
        });
}


