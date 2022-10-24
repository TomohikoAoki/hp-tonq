export default function({ $axios, redirect }) {

    $axios.onResponse(config => {
        $axios.setHeader('Access-Control-Allow-Origin', 'http://localhost:8888')
    })



}