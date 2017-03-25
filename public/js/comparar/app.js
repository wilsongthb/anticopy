Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
var app = new Vue({
    el: '#app'
});
