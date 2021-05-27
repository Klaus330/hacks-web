<template>
    <div class="mt-4">
        <div class="carousel-inner" role="listbox">
            <div v-for="(person,index) in body" :key="person.name" class='item' :class="addActive(index)">
                            <div class="card">
                    <div class="card-head">
                        <img
                            :src="person.image"
                            alt="Thumbnail" class="circle-thumbnail">
                    </div>
                    <div class="card-body">
                        <strong class="text-center">{{person.description}}</strong>
                        <span>{{person.name}}</span>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel2" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel2" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
export default {
    name: "Team",
    data(){
        return {
            body:[
                {
                    name : "Popa Claudiu",
                    description : "Web Team Lead",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t1.6435-9/42936450_2290085721062998_6650902933988704256_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=kSzf2OgRrSEAX9b2i5k&_nc_ht=scontent-otp1-1.xx&oh=ae25282b00778c6110898f743ee6c582&oe=60C2E080"
                },
                {
                    name : "Cezar Andrei Todirisca",
                    description : "Backend Team Lead",
                    image : "https://cdn.discordapp.com/avatars/331812066178367498/a1abb5044fb60a3255dcd65e22ccccd0.png?size=256"
                },
                {
                    name : "Eusebiu Gabriel Agachi",
                    description : "Mobile Team Leader",
                    image : "https://cdn.discordapp.com/avatars/319575679907921922/2b9fbc417ee5da65ab7aeaff0a9d8195.png?size=128"
                },
                {
                    name : "Gabriela Murariu",
                    description : "API Team Leader",
                    image : "https://cdn.discordapp.com/avatars/688678555315732490/3afbe1473fcd14b7d2121bc84b863c46.png?size=512"
                },
                {
                    name : "Catalin Puricoi",
                    description : "Web Team",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t31.18172-8/13920444_1218060928238740_6580748844174892454_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=174925&_nc_ohc=4kEP9UinPUoAX9s4Dud&_nc_ht=scontent-otp1-1.xx&oh=bf5dd7dd16d6a4ce9180c5bd55b483cd&oe=60C2B9AF"
                },
                {
                    name : "Cristina-Iulia Rata",
                    description : "Web Team",
                    image : "https://cdn.discordapp.com/avatars/688428202686808117/3bb60b9063428ccbe6385dbf188b5307.png?size=256"
                },
                {
                    name : "Adelin Sandu",
                    description : "Web Team",
                    image : "https://cdn.discordapp.com/avatars/684782051911663625/3908f5a80ad06b3e4cb30c0d4ee718c2.png?size=256"

                },
                {
                    name : "Claudiu Stoian",
                    description : "Web Team",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t31.18172-8/26023964_1775432702529746_7534355593044751892_o.jpg?_nc_cat=109&ccb=1-3&_nc_sid=174925&_nc_ohc=y1BYibeJaHAAX9AiRM2&_nc_ht=scontent-otp1-1.xx&oh=aaf71f0ec4c2066396c78e56d50fc6c0&oe=60C29BB2"
                },
                {
                    name : "Razvan Benchia",
                    description : "Mobile",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t31.18172-8/13522695_857951140975462_6520552657115113955_o.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=JM55XObNtGcAX8TnHvX&tn=xp08L5CelZw9ky-6&_nc_ht=scontent-otp1-1.xx&oh=b00710d872e262d58dc1254edd38eb1c&oe=60C1B6A6"
                },
                {
                    name : "Mihai Dobrovici",
                    description : "Mobile",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t31.18172-8/20626291_1416123495130556_3276803623865894056_o.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=NLs3NmfI6JoAX9bdgHC&_nc_ht=scontent-otp1-1.xx&oh=ee98590a6e46119a13a4e7e9d063c48e&oe=60C3A1E5"
                },
                {
                    name : "Iulia Oceanu",
                    description : "Mobile",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t1.6435-9/117671470_2996483697145779_6313510468139202944_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=roDzVjjj-s0AX-WPNHz&_nc_ht=scontent-otp1-1.xx&oh=53d9206e3a52c2917b1f2acfc69823aa&oe=60C37EDD"

                },
                {
                    name : "Victor Rosca",
                    description : "Mobile",
                    image : "https://cdn.discordapp.com/avatars/381166520719507456/e1cfe1e2e2fab0dc82549a718969fff7.png?size=256"
                },
                {
                    name : "Enelyna Tincu",
                    description : "Mobile",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t1.6435-9/69056900_2382177825182266_6136796881960828928_n.jpg?_nc_cat=106&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=GWc6ox8ZResAX_w7Vx1&_nc_ht=scontent-otp1-1.xx&oh=bbda0b03d2c5fb7adc921fe414605c96&oe=60C3C752"

                },
                {
                    name : "Adina Avram",
                    description : "API Team",
                    image : "https://cdn.discordapp.com/avatars/688801953953742935/9a05694c52942b03a483ff92e0ec7b07.png?size=256"

                },
                {
                    name : "Alexandru Dobos",
                    description : "API Team",
                    image : "https://cdn.discordapp.com/avatars/688444621860110363/00129c56513016e5f2e3e153d2b3c281.png?size=256"

                },
                {
                    name : "Adelina Bordeianu",
                    description : "API Team",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t1.6435-9/86737006_1775726802570363_4667906285633536000_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=46kmmuUIECEAX-zCgZ_&_nc_ht=scontent-otp1-1.xx&oh=f7257a1f6bd18be85ce08e35acbe6d65&oe=60C27647"

                },
                {
                    name : "Alexandra Pohoata",
                    description : "API Team",
                    image : "https://cdn.discordapp.com/avatars/688740691907706922/f9440a00f9ffe2a92416dce123b2ebd1.png?size=256"

                },
                {
                    name : "Gabriela Ursachi",
                    description : "API Team",
                    image : "https://cdn.discordapp.com/avatars/688424002586411069/6a282d2afde53087199fe8530a463104.png?size=256"

                },
                {
                    name : "Teodor Zet",
                    description : "API Team",
                    image : "https://cdn.discordapp.com/avatars/329552722699485186/a24f051b8b643b3dc4a6a1c19e705053.png?size=256"

                },
                {
                    name : "Eugeniu Buliga",
                    description : "Backend Team",
                    image : "https://cdn.discordapp.com/avatars/501437892401561624/1ca22efb74ddbdb6909eee5103b98276.png?size=256"

                },
                {
                    name : "Rafael Burca",
                    description : "Backend Team",
                    image : "https://cdn.discordapp.com/avatars/316562131992576001/62f16689d1637f870b15578177d83e1d.png?size=256"
                },
                {
                    name : "Florin Petrariu",
                    description : "Backend Team",
                    image : "https://cdn.discordapp.com/avatars/688449314917318884/0ede020b1c9e790a8f2edc5f6ba5bd9d.png?size=256"
                },
                {
                    name : "Stefan Pogor",
                    description : "Backend Team",
                    image : "https://scontent-otp1-1.xx.fbcdn.net/v/t1.6435-9/71038004_1374258296066396_8126405769907142656_n.jpg?_nc_cat=106&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=vcfvrE7dSSUAX_Jum0z&_nc_ht=scontent-otp1-1.xx&oh=51fd20de0ceddc37521a466dc933c0a0&oe=60C26C39"

                },
                {
                    name : "Andrei Toma",
                    description : "Backend Team",
                    image : "https://cdn.discordapp.com/avatars/420287830489694208/4eed114fe8293ee7dedced9f9d08a559.png?size=256"
                }
            ]
        }
    },

    methods: {
        addActive(index){
            return index==0 ? "active" : "";
        }
    }

}
</script>

<style scoped>

</style>
