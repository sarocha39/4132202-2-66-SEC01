var num = 10;
let name = "kloy";
age = 20;

fruit = ["apple","mango","tangmo"];
ojb = {name:"Chompooh",age:21,tel:"1123-456"};

data = {adress: ["69","Jira","Buriram", 3100], name:"John"};

console.log(fruit[1]);
console.log(ojb.tel);
console.log(data.adress[2]);

    document.getElementById("msg").innerHTML = data.adress[2];

    let longTxt = data.name + " : " + fruit[0];
    longTxt = `${data.name} :
            ${fruit[1]}` ;

        $(function(){
            $("#msg").html(longTxt);
        });//jQuery ready