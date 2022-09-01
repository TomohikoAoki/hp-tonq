export default {
    // Target: https://go.nuxtjs.dev/config-target
    target: "static",

    // Global page headers: https://go.nuxtjs.dev/config-head
    head: {
        title: "hp-tonq",
        htmlAttrs: {
            lang: "ja",
        },
        meta: [
            { charset: "utf-8" },
            { name: "viewport", content: "width=device-width, initial-scale=1" },
            { hid: "description", name: "description", content: "" },
            { name: "format-detection", content: "telephone=no" },
        ],
        link: [
            { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
            {
                href: "https://fonts.googleapis.com/icon?family=Material+Icons",
                rel: "stylesheet",
            },
        ],
    },

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: ["~assets/css/destyle.css", "~assets/css/common.scss"],

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [{ src: "~/plugins/routerOption.js", ssr: false }],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        'nuxt-lazy-load'
    ],

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {
        postcss: {
            // キーとしてプラグイン名を、値として引数を追加します
            // プラグインは前もって npm か yarn で dependencies としてインストールしておきます
            plugins: {
                // 値として false を渡すことによりプラグインを無効化します
                'postcss-url': false,
                'postcss-nested': {},
                'postcss-responsive-type': {},
                'postcss-hexrgba': {}
            },
            preset: {
                // postcss-preset-env 設定を変更します
                autoprefixer: {
                    grid: true
                }
            }
        }
    },
};