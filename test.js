window.onload = async function(){
    let rep = await fetch('https://api.tcgdex.net/v2/fr/cards', { method: 'GET' });
    let reponse = await rep.json();
    console.log(reponse);
}