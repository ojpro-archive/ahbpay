require('./bootstrap');
require('alpinejs');

window.setLang = (lang) => {

    window.localStorage.setItem('lang', $lang);
}

window.getLang = () => {
    return window.localStorage.getItem('lang');
}
