<!doctype html>
<html lang="en">
<head>
    <title>ПЕСОЧНИЦА</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body >
<script src="/node_modules/vue/dist/vue.js"></script

<h1>Связывание</h1>

    <div id="app">

        <input type="text" v-model = "userdata.name">
        <input type="text" v-model = "userdata.age">
        <p> Имя: {{userdata.name}} Возраст: {{userdata.age}} </p>
        <p>{{checkage()}}</p>
        <p>{{checkage1}}</p>
    </div>

    <script>

        var userdata = {name:'tom', age:25};
        var app = new Vue({
            el: '#app',
            data:{userdata,
                  message1:"Доступ разрешен",
                  message0:"Доступ запрещен"
            },
            computed:{
                checkage1:function () {
                    console.log("computed");
                    if (this.userdata.age > 18)
                        return this.message1;
                    return this.message0;
                }
            },
            methods: {
                checkage:function () {
                    console.log("method");
                    if (this.userdata.age>18)
                        return this.message1;
                        return this.message0;
                }

            }
        })
    </script>

<h1>Условия, массивы</h1>
    <div id="app1">
       <ul>
           <li v-for = "(phone,index) in Phones ">
               {{index+1}} {{phone}}
           </li>
       </ul>
    </div>
    <script>
            var obj_vue = new Vue({
                el: "#app1",
                data:{
                    newPhone:"",
                    Phones:['Galaxy x3','sasungx4','nokiap8','iphonex7']

                }

            });
    </script>

<div id="app2">
    <ul>
        <li v-for = "(user,index) in userdata ">{{index+1}}


                <span v-for = "(item,key) in user">{{key}}:{{item}},
                </span>


        </li>
    </ul>
</div>
<script>
    var obj_vue = new Vue({
        el: "#app2",
        data: {
            userdata: [
                {name:'tom', age:30},
                {name:'jonh', age:13},
                {name:'sem', age:318},
                {name:'miki', age:0}
            ]
        }
    });
</script>

<div id="app3">
    <input type="text" v-model = "newItem">
    <span v-if = "newItem">
        <button v-on:click= "add(newItem)">   Добавить</button>

    </span>

    <ul>
        <li v-for = "(Item,index) in Items ">
            <p>{{index+1}} {{Item}}   <button v-on:click = "delet(index)">Удалить</button></p>
        </li>
    </ul>
</div>
<script>
    var obj_vue = new Vue({
        el: "#app3",
        data: {
            newItem:"",
            Items: ['Galaxy x3','samsung x4','nokia 8','iphone x7'],

        },
        methods:{
            add:function(Item){
                this.Items.push(Item);
                this.newItem = "";
            },
            delet:function (index) {
                this.Items.splice(index,1);

            }
        }
    });
</script>
<h1> Живая фильтрация массива</h1>
<div id="app4">
    <input type="text" v-model = "company">

    <ul>
        <li v-for = "phone in  filterlist ">
            <p>{{phone.title }} {{phone.company}}  </p>
        </li>
    </ul>
</div>
<script>
    var obj_vue = new Vue({
        el: "#app4",
        data: {
            company:"",
            phones: [
                {title:"Galaxy x3",company:"samsung"},
                {title:"Iphone x7",company:"Ibm"},
                {title:"Nokia x8",company:"net"},
                {title:"sony",company:"sony"},
                {title:"texet ",company:"sunxun"},
                {title:"sony x1",company:"sony"},
                {title:"sony-ericson",company:"sony"},
                {title:"samsung galaxix4",company:"samsung"},
                {title:"samsung g8",company:"samsung"},
                ],

        },

        computed:{
            filterlist(){
                var comp = this.company;
               return  this.phones.filter(function(elem)
                    {
                        if (comp ==="") return true;
                        else return elem.company.indexOf(comp) >-1;


                    }

                )

            }

        }
    });
</script>


<h1> Работа с формами</h1>
<div id="app5" style="margin-left: 50px; max-width: 50%; margin-bottom: 50px"  >
    <label>Имя</label>
    <input type="text" v-model = "name" placeholder="Enter yuor name" class="form-control">
    <label>Фамилия</label>
    <input type="text" v-model = "secName" placeholder="Enter yuor secname" class="form-control">
    <label>Возраст</label>
    <input type="text" v-model = "age" placeholder="Enter yuor age" class="form-control">
    <label>Место работы</label>
    <input type="text" v-model = "company" placeholder="Enter company" class="form-control">
    <label>Комментарий</label>
    <textarea v-model = "comment" class="form-control">{{comment}}</textarea>

    <p>Имя: {{name}}</p>
    <p>Фамилия: {{secName}}</p>
    <p>Возраст: {{age}}</p>
    <p>Место работы: {{company}}</p>
    <p>Комментарий: {{comment}}</p>


</div>
<script>
    var obj_vue = new Vue({
        el: "#app5",
        data: {
            name:"",
            secName:"",
            company:"",
            age:0,
            comment:"Hello world"
        }


    });
</script>

<h1> Флажки </h1>
<div id="app6" style="margin-left: 50px; max-width: 50%; margin-bottom: 50px"  >

    <input type="checkbox" v-model = "checked" >
    <span v-if = "checked">Выключить</span>
    <span v-else>Включить</span>
<!--    <label>{{checked}}</label>-->
</div>
<script>
    var obj_vue = new Vue({
        el: "#app6",
        data: {
            checked:true
        }


    });
</script>

<h1> Привязка флажков к массиву</h1>
<input type="rext" value="sdjfjklsdh">
<div id="app7" style="margin-left: 50px; max-width: 50%; margin-bottom: 50px"  >
    <ul>
        <li v-for = "(user,index) in userdata ">{{index+1}}
            <span> {{user.name}}:{{user.phone}}</span>
            <input type="checkbox" v-model = "selected" v-bind:value="user.name" >
        </li>

    </ul>
    <span> selected:{{selected}}</span>


    </p>
<!--    <label>Имя</label>-->
<!--    <input type="text" v-model = "name" placeholder="Enter yuor name" class="form-control">-->
<!--    <label>Фамилия</label>-->
<!--    <input type="text" v-model = "secName" placeholder="Enter yuor secname" class="form-control">-->
<!--    <label>Возраст</label>-->
<!--    <input type="text" v-model = "age" placeholder="Enter yuor age" class="form-control">-->
<!--    <label>Место работы</label>-->
<!--    <input type="text" v-model = "company" placeholder="Enter company" class="form-control">-->
<!--    <label>Комментарий</label>-->
<!--    <textarea v-model = "comment" class="form-control">{{comment}}</textarea>-->
<!---->
<!--    <p>Имя: {{name}}</p>-->
<!--    <p>Фамилия: {{secName}}</p>-->
<!--    <p>Возраст: {{age}}</p>-->
<!--    <p>Место работы: {{company}}</p>-->
<!--    <p>Комментарий: {{comment}}</p>-->


</div>
<script>
    var obj_vue = new Vue({
        el: "#app7",
        data: {
            userdata:[
                {name:"serg",phone:"nokia",check:false},
                {name:"sem",phone:"samsung",check:false},
                {name:"lion",phone:"iphone x5",check:false},
                {name:"ted",phone:"sony",check:false}
            ],
            selected:[],
        }
    });
</script>





<h1> Компонеты VUE изменение массива в дочернем компоненте напрямую и с созданием события </h1>
<div id="app8" style="margin-left: 100px; margin-bottom: 100px">

<formedit :users = "users"></formedit>

<div>
    <h2>Список пользователей</h2>
    <showitem v-for = "(user,index) in users"
              :user = "user"
              :index = "index"
              :key = "index"
              v-on:userdelete = "remove">
    </showitem>
</div>

</div>

<script>

    Vue.component('formedit', {
        props: ["users"],
        data:function () {
                return{
                    user:{name:"",age:18}
                }
             },
        template: `<div>
                    <input type="text" v-model="user.name" />
                    <input type="number" v-model="user.age" />
                    <button v-on:click = "add">Добавить</button>
                </div>`,

        methods:{
            add:function(){
                this.users.push({name:this.user.name,age:this.user.age})
            }
        }
    });


    Vue.component("showitem",{
        props:["user","index"],
        template:`<div>
                  <p> {{user.name}} : {{user.age}}
                  <button v-on:click = "deluser(index)">Удалить</button>
                  </p>
                  </div>`,
        methods:{
            deluser:function(index){
                this.$emit("userdelete",index)
            }
        }




    });


    var obj_vue = new Vue({
        el: "#app8",
        data: {
            users:[
                {name: "serg", age: 20},
                {name: "sem", age: 24},
                {name: "lion", age: 27},
                {name: "ted", age: 27}
            ]
        },
         methods:{remove:function(value){
            this.users.splice(value,1);
    }
        }
    });

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body >
</html>
