const infoCentreAntiPoisonJson=[
    {name:"Le Centre Antipoison Animal et Environnemental de l'Ouest ",adresse:"Adresse : Ecole Nationale Vétérinaire Agroalimentaire et de Alimentation Nantes Atlantique Oniris Atlanpôle - La Chantrerie  44307 NANTES Cedex ", telephone:" Téléphone : 02 40 68 77 40"},
    {name:"Le Centre National d'Informations Toxicologiques Vétérinaires", adresse:"Adresse : Le Centre National d'Informations Toxicologiques Vétérinaires Campus Vétérinaire de l'école vétérinaire de Lyon - VetAgroSup - 1 rue Bourgelat 69280 MARCY L'ETOILE",telephone:"Téléphone : 04 78 87 10 40"}
];
const urgenceVeterinaireJson=[
    {name:"Urgence Veterinaire",telephone:"Téléphone : 3115"}
];
const urgenceChatJson=[
    {titre:"MON CHAT EST TOMBÉ DU BALCON",infos:"Chez le chat, la chute du balcon est un accident très fréquent, entre mars et novembre. Le chat retombe toujours sur ses pattes, mais une consultation s’impose pour dépister les lésions les plus graves."},
    {titre:"ABCÈS CHEZ LE CHAT",infos:"L’abcès du chat est un motif de consultation très fréquent aux urgences vétérinaires. Comment reconnaître un abcès? Quelles sont les causes d’un abcès chez le chat ? Que faire en cas d’abcès?"},
    {titre:"LE TYPHUS CHEZ LE CHAT",infos:"Le typhus du chat, ou panleucopénie féline, est une maladie virale mortelle, très répandue en France. Le virus du typhus, ou virus FPV (Feline Panleucopenia Virus) cause de nombreux décès tous les ans, chez les chats et chatons."},
    {titre:"LE CORYZA CHEZ LE CHAT",infos:"Le coryza est un syndrome respiratoire du chat à l’origine de nombreuses urgences vétérinaires. Ecoulement oculaire, gène ou détresse respiratoire et toux sont des symptomes inquiétants à présenter en consultation."},
    {titre:"CALCULS URINAIRES CHEZ LE CHAT",infos:"Les problèmes urinaires du chat représentent près de 15% des motifs de consultation aux urgences vétérinaires. Les premiers symptômes d’une simple cystite sont souvent les mêmes que ceux d’une grave obstruction urétrale."},
    {titre:"LA LEUCOSE CHEZ LE CHAT",infos:"La leucose du chatest une maladie virale mortelle qui provoque un syndrome d’immuno-déficience chez les félins. Cette maladie insidieuse, incurable et mortelle peut néanmoins être évitée grâce à un vaccin."},
    {titre:"LE SIDA, OU FIV, CHEZ LE CHAT",infos:"Le Sida du chat, ou FIV (Feline Immuno-deficience Virus), est une maladie virale incurable et mortelle. La pathologie est responsable de grave immuno-déficience, et favorise les infections bactériennes."},
    {titre:"INSUFFISANCE RÉNALE CHEZ LE CHAT",infos:"L’insuffisance rénale terminale correspond à une grave décompensation de la fonction de filtration des reins de votre animal. Urée et créatinine provoquent alors une grave dégradation de l’état de santé de votre animal."}

];
const urgenceChienJson=[
    {titre:"TORSION DE L’ESTOMAC CHEZ LE CHIEN",infos:"Le syndrome de dilatation/torsion de l’estomac du chien de grande race est une urgence vitale absolue, dans laquelle chaque minute compte ! Le pronosotic et le taux de survie s’améliore avec une prise en charge rapide."},
    {titre:"LA PARVOVIROSE CHEZ LE CHIEN",infos:"La parvovirose cause le décès de nombreux chiens. Maladie virale mortelle chez le chiot, la parvovirose provoque des symptômes digestifs sévères et aigus. Le vaccin existe depuis plusieurs décennies mais la maladie est loin d’avoir disparu."},
    {titre:"LA MALADIE DE CARRÉ CHEZ LE CHIEN",infos:"La Maladie de Carré est une pathologie virale mortelle chez le chien. Un vaccin existe mais de nombreux cas sont consultés aux urgences chaque année. Très contagieuse, la Maladie de Carré est une maladie au pronostic réservé."},
    {titre:"LA PIROPLASMOSE CHEZ LE CHIEN",infos:"La piroplasmose est une maladie grave, très fréquente en France. Transmise par une tique, la piroplasmose provoque une destruction massive des globules rouges et une anémie sévère."},
    {titre:"L'OEDÈME AIGU DU POUMON",infos:"L’œdème aigu du poumon est une accumulation de liquide dans les voies respiratoires profondes, qui provoque une toux. Les animaux cardiaques sont très sujets à l’œdème aigu du poumon, signe de décompensation de l’insuffisance cardiaque."},
    {titre:"EPILLET CHEZ LE CHIEN (OU SPIGAOU)",infos:"Entre avril et octobre, chiens et chats peuvent attraper un épillet, encore appelé spigaou ou herbe folle. Dans l’oeil, l’oreille, la narine ou entre les doigts, les épillets se logent dans les moindres recoins et cavités de l’organisme."},
    {titre:"LA BRÛLURE DES COUSSINETS",infos:"Avec plus de 55°C au plus chaud de la journée, le bitume de la route et du trottoir peut causer des brûlures graves sur les coussinets des chiens. En période de canicule, vous devez adapter vos habitudes de promenades."}
];

const infosPoison = document.querySelector(".infosPoison");
infoCentreAntiPoisonJson.forEach((info)=>{

    const articleElement = document.createElement("article");
    const h3Element = document.createElement("h3");
    const adresseElement = document.createElement("p");
    const telElement = document.createElement("p");

    let h3Content = document.createTextNode(info.name);
    let adresseContent = document.createTextNode(info.adresse);
    let telContent = document.createTextNode(info.telephone);

    articleElement.appendChild(h3Element);
    articleElement.appendChild(adresseElement);
    articleElement.appendChild(telElement);

    h3Element.appendChild(h3Content);
    adresseElement.appendChild(adresseContent);
    telElement.appendChild(telContent);

    infosPoison.appendChild(articleElement);


})
const urgenceVeto = document.querySelector(".urgenceVeto");
urgenceVeterinaireJson.forEach((infosVeto)=>{
    
    const articleElement = document.createElement("article");
    const h2Element = document.createElement("h2");
    const telElement = document.createElement("p");

    let h2Content = document.createTextNode(infosVeto.name);
    let telContent = document.createTextNode(infosVeto.telephone);

    articleElement.appendChild(h2Element);
    articleElement.appendChild(telElement);

    h2Element.appendChild(h2Content);
    telElement.appendChild(telContent);

    urgenceVeto.appendChild(articleElement);
})

const urgenceChat = document.querySelector(".urgenceChat");
urgenceChatJson.forEach((infosUrgenceChat)=>{

    const articleElement = document.createElement("article");
    const h3Element = document.createElement("h3");
    const infosElement = document.createElement("p");

    let h3Content = document.createTextNode(infosUrgenceChat.titre);
    let infosContent = document.createTextNode(infosUrgenceChat.infos);

    articleElement.appendChild(h3Element);
    
    articleElement.appendChild(infosElement);

    h3Element.appendChild(h3Content);
    infosElement.appendChild(infosContent);

    urgenceChat.appendChild(articleElement);
})

const urgenceChien = document.querySelector(".urgenceChien");
urgenceChienJson.forEach((infosUrgenceChien)=>{

    const articleElement = document.createElement("article");
    const h3Element = document.createElement("h3");
    const infosElement = document.createElement("p");

    let h3Content = document.createTextNode(infosUrgenceChien.titre);
    let infosContent = document.createTextNode(infosUrgenceChien.infos);

    articleElement.appendChild(h3Element);
    
    articleElement.appendChild(infosElement);

    h3Element.appendChild(h3Content);
    infosElement.appendChild(infosContent);

    urgenceChien.appendChild(articleElement);
})
