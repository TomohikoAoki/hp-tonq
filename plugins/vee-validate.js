import Vue from 'vue'
import { ValidationProvider, extend, ValidationObserver, localize } from 'vee-validate/dist/vee-validate'
import { required, email, max, confirmed } from 'vee-validate/dist/rules'
import ja from 'vee-validate/dist/locale/ja.json'
import { setInteractionMode } from 'vee-validate/dist/vee-validate';

extend('required', required);
extend('email', email)
extend('max', max)
extend('confirmed', confirmed)
extend('zipCode', value => {
    return /^[0-9]{7}$/.test(value) ? true : '半角数字で7桁の数字で入力してください。';
})
extend('phoneNumber', value => {
    return /^0[0-9]{9,10}$/.test(value) ? true : '電話番号の形式が異なります。半角数字で記号なしで入力してください';
})

localize('ja', ja)
localize({
    ja: {
        names: {
            email: 'メールアドレス',
            firstName: '名前',
            lastName: '氏名',
            emailConfirmed: 'メールアドレス',
            phoneNumber: '電話番号',
            zipCode: '郵便番号',
            address: '住所',
            shop: '店舗',
            content: 'お問い合わせ内容'
        },
        messages: {
            email: 'メールアドレスの形式が有効でありません。',
            confirmed: '上で入力したアドレスと異なります。',
        }
    },
})

setInteractionMode('eager');

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);