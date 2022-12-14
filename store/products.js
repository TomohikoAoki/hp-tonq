const state = () => ({
    products: [{
            productId: 1,
            name: "やまと豚ロースかつ定食",
            codeName: "yamato-roce",
            price: [
                { optionName: "120g", price: 1380 },
                { optionName: "150g", price: 1660 },
                { optionName: "200g", price: 1980 },
            ],
            positionReverse: false,
            priceOption: true,
            photo: true,
            category: 1,
        },
        {
            productId: 2,
            name: "やまと豚ヒレかつ定食",
            codeName: "yamato-hire",
            price: [
                { optionName: "120g", price: 1530 },
                { optionName: "150g", price: 1980 },
            ],
            positionReverse: true,
            priceOption: true,
            photo: true,
            category: 1,
        },
        {
            productId: 3,
            name: "やまと豚厚切りロースかつ定食【240g】",
            price: 2380,
            category: 1,
        },
        {
            productId: 4,
            name: "やまと豚厚切りヒレかつ定食【240g】",
            price: 2480,
            category: 1,
        },
        {
            productId: 5,
            name: "やまと豚おすすめ定食",
            price: 1610,
            category: 1,
        },
        {
            productId: 6,
            name: "やまと豚カットリブ",
            price: 550,
            category: 1,
        },
        {
            productId: 7,
            name: "赤城豚ロースかつ定食",
            codeName: "akagi-roce",
            price: [
                { optionName: "120g", price: 1300 },
                { optionName: "150g", price: 1560 },
                { optionName: "200g", price: 1890 },
            ],
            positionReverse: false,
            priceOption: true,
            photo: true,
            category: 2,
        },
        {
            productId: 8,
            name: "国産豚ヒレかつ定食",
            price: [
                { optionName: "120g", price: 1430 },
                { optionName: "150g", price: 1780 },
            ],
            priceOption: true,
            category: 2,
        },
        {
            productId: 10,
            name: "赤城豚厚切りロースかつ定食【240g】",
            price: 2180,
            category: 2,
        },
        {
            productId: 11,
            name: "国産豚厚切りヒレかつ定食【240g】",
            price: 2250,
            category: 2,
        },

        {
            productId: 12,
            name: "国産豚ヒレと海老フライ定食",
            codeName: "ebi-hire",
            price: 1810,
            positionReverse: false,
            priceOption: false,
            photo: true,
            category: 3,
        },
        {
            productId: 13,
            name: "天然大海老フライ定食",
            codeName: "ohebi",
            price: [
                { optionName: "一本", price: 1910 },
                { optionName: "二本", price: 3180 },
            ],
            positionReverse: true,
            priceOption: true,
            special: true,
            photo: true,
            category: 3,
        },
        {
            productId: 14,
            name: "赤城豚ロースかつと海老フライ定食",
            price: 1920,
            category: 3,
        },
        {
            productId: 15,
            name: "自家製海老かつ定食",
            price: 1580,
            category: 3,
        },
        {
            productId: 16,
            name: "レディースセット",
            price: 1610,
            takeoutPrice: 1410,
            category: 3,
        },
        {
            productId: 17,
            name: "赤城豚ねぎおろし定食",
            codeName: "negioroshi",
            price: 1550,
            positionReverse: false,
            priceOption: false,
            photo: true,
            category: 4,
        },
        {
            productId: 18,
            name: "国産ヒレ二色巻き定食",
            codeName: "nishoku",
            price: 1550,
            positionReverse: true,
            priceOption: false,
            photo: true,
            category: 4,
        },
        {
            productId: 19,
            name: "国産ヒレチーズ巻き定食",
            price: 1550,
            category: 4,
        },
        {
            productId: 20,
            name: "国産ヒレ梅しそ巻き定食",
            price: 1550,
            category: 4,
        },
        {
            productId: 21,
            name: "赤城豚ロースチーズかつ定食",
            price: 1580,
            category: 4,
        },
        {
            productId: 22,
            name: "味噌ロースかつ定食",
            price: 1550,
            category: 4,
        },
        {
            productId: 23,
            name: "やまと豚メンチかつ定食",
            price: 1380,
            category: 4,
        },
        {
            productId: 24,
            name: "かつ鍋定食",
            price: 1520,
            category: 4,
        },
        {
            productId: 25,
            name: "ひかえめ定食【梅】",
            description: "海老かつ60gとヒレ巻き",
            price: 1380,
            category: 4,
        },
        {
            productId: 25,
            name: "ひかえめ定食【桃】",
            description: "やまと豚ヒレと海老フライ１本",
            price: 1380,
            category: 4,
        },
        {
            productId: 26,
            name: "ひかえめ定食【桜】",
            description: "国産豚ヒレのねぎおろしかつ",
            price: 1380,
            category: 4,
        },

    ],
});

const getters = {
    getMenuData: (state) => (id) => {
        return state.products.filter((item) => item.category === id);
    },
    getMenuAllData: (state) => state.products,
};

export default {
    namespaced: true,
    state,
    getters,
};