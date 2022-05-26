
// image projet

let truc = document.getElementById("pho1");
let truc2 = document.getElementById("pho2");

let img1 = document.getElementById("img1");
let img2 = document.getElementById("img2");

//image 1

truc.addEventListener("mouseenter", function (event) {

    // on met l'accent sur la cible de mouseenter
    img1.classList.add('disp');

}, false);

truc.addEventListener("mouseleave", function (event) {

    // on met l'accent sur la cible de mouseenter
    img1.classList.remove('disp');

}, false);

//image  2

truc2.addEventListener("mouseenter", function (event) {

    img2.classList.add('disp');

}, false);

truc2.addEventListener("mouseleave", function (event) {

    img2.classList.remove('disp');

}, false);

//---------------------image projet||---------------------------\



// competences

let elem = document.getElementById("competences");
let art = elem.getElementsByTagName('a')
let desc = document.getElementsByClassName('desc')
// let btn1 = document.getElementById("rrr")
let corps = document.getElementsByTagName('main')


for (let i = 0; i < art.length; i++) {

    art[i].addEventListener("click", function (event) {


        desc[0].classList.add('vois');
        desc[1].classList.add('close');
        desc[2].classList.add('text');
        

        fetch('./competences.json')
            .then(response => response.json())
            .then(data => {

                let name = data.competences[i].name
                let descrip = data.competences[i].description
                let img = data.competences[i].img
                let alt = data.competences[i].alt


                let listItem = `<div id=lala > <div><h2>${name}</h2><p>${descrip}</p></div> <img src="${img}" alt="${alt}"> </div> `
                desc[2].innerHTML = ' '
                desc[2].innerHTML += listItem


            }).catch(console.error)

        desc[1].addEventListener("click", function (event) {

            desc[0].classList.remove('vois');
            desc[1].classList.remove('close');

            desc[2].innerHTML = " "

        }, false)


    }, false);

}


//menu//////////////


let look = document.getElementsByTagName('nav')
let imgm = document.getElementById('menu2')
let crx = document.getElementById('croix')

imgm.addEventListener("click", function (event){

    look[0].classList.add('look')

    setTimeout(mafonction, 300);

    function mafonction(){

        imgm.style.display = 'none';
        crx.style.display = 'block';
    }
    

}, false)

crx.addEventListener("click", function (event){

    look[0].classList.remove('look')

    setTimeout(mafonction1, 300);

    function mafonction1(){

        crx.style.display = 'none'
        imgm.style.display = 'block'
        

    }

}, false)


// Parcours

let parcours = document.getElementById("parc")
let body = document.getElementsByTagName('main')

let listItem1 = `
                
                <section id="parcjs">

                <h2>Parcours</h2>

                 <h3> Développeur Web et web mobile </h3> 
                <p>De mai jusqu’en décembre 2021 j’ai suivi cette formation avec à la clé un titre pro obtenu avec succès. Pendant cette formation j’ai eu la possibilité d’apprendre les languages suivant : HTML, CSS, PHP, JAVASCRIPT, SQL.</p> 
                
            
                <h3> Stage dèveloppeur-se web et web mobile  </h3> 
                <p>Durant la formation décrite plus haut j’ai eu la possibilité de faire un stage qui a duré un mois et dans lequel je devais créer un site de A à Z. Ce site servait à fabriquer des autorisations de stationnement pour le parking d’une résidence.<p> 
                
                <h3> Formation technicien maintenance système et réseau</h3> 
                <p>Durant cette formation d’une durée de 5 mois j’ai eu la possibilité d’apprendre l’architecture réseau, les modèles TCP/IP et OSI<p> 
                
                <h3>Stage technicien help-desk</h3>
                <p>Durant cette période d’immersion, j’ai aidé au déploiement de Windows 10.</p>

                </section>

                `

parcours.addEventListener("click", function (event) {

    body[0].innerHTML = " "
    body[0].innerHTML += listItem1
    footer.classList.remove('pied');

}, false);


let contact = document.getElementById('cont')

let listItem2 = ` 
                    <div id="contact">
                        <h2>Contactez-moi !</h2>

                        <form action="https://formspree.io/f/xbjwqvww" method="POST">

                        <label> Mail : </label>

                        <input type="email" name="email">

                        <label>Objet :</label>
                        <input type="text" name="objet">

                        <label>Votre Message :</label>
                        <textarea name="message"></textarea>

                        <button type="submit">Envoyer</button>

                        </form>
                    </div> `

let footer = document.getElementById('foot')

contact.addEventListener("click", function (event) {

    body[0].innerHTML = " "
    body[0].innerHTML += listItem2
    footer.classList.add('pied');

}, false);
