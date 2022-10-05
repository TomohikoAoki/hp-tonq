import Vue from 'vue'
import { ValidationProvider, extend, ValidationObserver, localize } from 'vee-validate/dist/vee-validate'
import { required, email, max, confirmed } from 'vee-validate/dist/rules'
import ja from 'vee-validate/dist/locale/ja.json'

extend('required', required);
extend('email', email)
extend('max', max)
extend('confirmed', confirmed)

localize('ja', ja)

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);