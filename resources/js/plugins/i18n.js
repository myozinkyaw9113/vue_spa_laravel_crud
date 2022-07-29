import { createI18n } from 'vue-i18n';
import mm from './../locales/mm.json'
import en from './../locales/en.json'

const messages = {
    mm : mm,
    en : en
}

const defaultLocale = 'en';

const i18n = createI18n({
    locale: defaultLocale,
    fallbackLocale: 'en', 
    messages, 
})

export default i18n