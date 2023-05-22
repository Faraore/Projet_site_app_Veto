//import errorspan
import ErrorSpan from './errorSpan.js';

class Inscription{

constructor(){
    //attributs
    this._champNom = "";
    this._champPrenom = "";
    this._champEmail = "";
    this._champPassword = "";
    this._champNumAdresse = "";
    this._champNomAdresse = "";
    this._champCodePostal = "";
    this._champVille = "";

}
//get->recupere la valeur du champNom
get champNom(){
    return this._champNom;
}
//set->modifi la valeur du champNom
set champNom(newChampNom){
    const regex = new RegExp(/^[a-zA-Z- éèà]{3,50}$/);
    if(newChampNom == ""){
        //console.log("ce champ ne doit pas etre vide");
        let errorSpan = new ErrorSpan("champNom","*ce champ ne doit pas etre vide");
        errorSpan.showSpan();
    }else if (!regex.test(newChampNom)){
        //console.log("votre Nom n'est pas correcte");
        let errorSpan = new ErrorSpan("champNom","votre Nom n'est pas correcte");
        errorSpan.showSpan();
    }else{
        //console.log("nom ok");
        this._champNom = newChampNom;
    }

}
get champPrenom(){
    return this._champPrenom;
}

set champPrenom(newChampPrenom){
    const regex = new RegExp(/^[a-zA-Z- éèà]{3,50}$/);
    if(newChampPrenom == ""){
       //console.log("ce champ ne doit pas etre vide");
       let errorSpan = new ErrorSpan("champPrenom","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampPrenom)){
       //console.log("votre Prenom n'est pas correcte");
       let errorSpan = new ErrorSpan("champPrenom","votre Prenom n'est pas correcte");
       errorSpan.showSpan();
    }else{
       //console.log("Prenom ok");
       this._champPrenom = newChampPrenom;
    }


}
get champEmail()
    {
        return this._champEmail;
    }
    
set champEmail(newChampEmail){
    const regex = new RegExp(/^[^@\s]+@[^@\s]+\.[^@\s]+$/);
    if(newChampEmail == ""){
        //console.log("ce champ ne doit pas etre vide");
        let errorSpan = new ErrorSpan("champEmail","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampEmail)){
            //console.log("votre Email n'est pas correcte");
            let errorSpan = new ErrorSpan("champEmail","votre Email n'est pas correcte");
       errorSpan.showSpan();
    }else{
        //console.log("Email ok");
        this._champEmail = newChampEmail;

    }
    
}
get champPassword(){
    return this._champPassword;
    }
    
set champPassword(newChampPassword){
    const regex = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/);
    if(newChampPassword == ""){
       //console.log("ce champ ne doit pas etre vide");
       let errorSpan = new ErrorSpan("champPassword","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampPassword)){
          // console.log("votre password n'est pas correcte");
          let errorSpan = new ErrorSpan("champPassword","votre password n'est pas correcte");
       errorSpan.showSpan();
    }else{
        //console.log("mdp ok");
        this._champPassword = newChampPassword;
    }
}
    
get champNumAdresse(){
        return this._champNumAdresse;
}
    
set champNumAdresse(newChampNumAdresse){

    const regex = new RegExp(/^([0-9]|[1-9][0-9]{1,2}|[1-9][0-9]{0,2}[a-zA-Z]+)$/);
    if(newChampNumAdresse == ""){
       //console.log("ce champ ne doit pas etre vide");
       let errorSpan = new ErrorSpan("champNumAdresse","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampNumAdresse)){
            //console.log("votre num d'addresse n'est pas correcte");
            let errorSpan = new ErrorSpan("champNumAdresse","votre numero d'adresse n'est pas correcte");
            errorSpan.showSpan();
    }else{
        //console.log("ok");
        this._champNumAdresse = newChampNumAdresse;
    }
}
get champNomAdresse(){
    return this._champNomAdresse;
}
    
set champNomAdresse(newChampNomAdresse){
    const regex = new RegExp(/^[a-zA-Z- éèà]{3,50}$/);
    if(newChampNomAdresse == ""){
       //console.log("ce champ ne doit pas etre vide");
       let errorSpan = new ErrorSpan("champNomAdresse","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampNomAdresse)){
        //console.log("votre  adresse n'est pas correcte");
        let errorSpan = new ErrorSpan("champNomAdresse","votre adresse n'est pas correcte");
       errorSpan.showSpan();
    }else{
      //console.log("adresse ok");
      this._champNomAdresse = newChampNomAdresse;
    }
        
        
    
}

get champCodePostal(){
        return this._champCodePostal;
}
    
set champCodePostal(newChampCodePostal){
        
    const regex = new RegExp(/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/i);
    if(newChampCodePostal == ""){
       //console.log("ce champ ne doit pas etre vide");
       let errorSpan = new ErrorSpan("champCodePostal","ce champ ne doit pas etre vide");
       errorSpan.showSpan();
    }else if (!regex.test(newChampCodePostal)){
       //console.log("votre  CP n'est pas correcte");
       let errorSpan = new ErrorSpan("champCodePostal","votre CP n'est pas correcte");
       errorSpan.showSpan();
    }else{
       //console.log("CP ok");
       this._champCodePostal =newChampCodePostal;
    } 
    
}
    get champVille(){
        return this._champVille;
    }
    
    set champVille(newChampVille){
        const regex = new RegExp(/^[a-zA-Z- éèà]{3,50}$/);
        if(newChampVille == ""){
          // console.log("ce champ ne doit pas etre vide");
          let errorSpan = new ErrorSpan("champVille","ce champ ne doit pas etre vide");
          errorSpan.showSpan();
        }else if (!regex.test(newChampVille)){
           // console.log("votre Ville n'est pas correcte");
            let errorSpan = new ErrorSpan("champVille","votre ville n'est pas correcte");
            errorSpan.showSpan();
        }else{
           //console.log("Ville ok");
           this._champVille = newChampVille;
        } 
        
    }
    getInputs(inputs){
        for(const input of inputs){
            
            if(input.id == "champNom"){
                this.champNom = input.value;
            }
            else if(input.id == "champPrenom"){
                this.champPrenom = input.value;
            }
            else if(input.id == "champEmail"){
                this.champEmail = input.value;
            }
            else if(input.id == "champPassword"){
                this.champPassword = input.value;
            }
            else if(input.id == "champNumAdresse"){
                this.champNumAdresse = input.value;
            }
            else if(input.id == "champNomAdresse"){
                this.champNomAdresse = input.value;
            }
            else if(input.id == "champCodePostal"){
                this.champCodePostal = input.value;
            }
            else if(input.id == "champVille"){
                this.champVille = input.value;
            }
        }
    }
}
// activer l'export 
export default Inscription;