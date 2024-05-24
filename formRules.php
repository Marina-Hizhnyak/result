<?php
function getRules() {
    return [
        'nom' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Nom must be filled in'],
            ['rule' => 'min', 'value' => 2, 'message' => 'Field Nom must be >=2 symbols'],
            ['rule' => 'max', 'value' => 255, 'message' => 'Field Nom must be <=255 symbols']
        ],
        'prenom' => [
            ['rule' => 'min', 'value' => 2, 'message' => 'Field Nom must be >=2 symbols'],
            ['rule' => 'max', 'value' => 255, 'message' => 'Field Nom must be <=255 symbols']
        ],        
        'email' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Email must be filled in'],
            ['rule' => 'email', 'value' => null, 'message' => 'Field Email must be email address']
        ], 
        'message' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Message must be filled in'],
            ['rule' => 'min', 'value' => 10, 'message' => 'Field Nom must be >=10 symbols'],
            ['rule' => 'max', 'value' => 3000, 'message' => 'Field Nom must be <=3000 symbols']            
        ],
        'inscription_pseudo' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Inscription_pseudo must be filled in'],
            ['rule' => 'min', 'value' => 2, 'message' => 'Field Nom must be >=2 symbols'],
            ['rule' => 'max', 'value' => 255, 'message' => 'Field Nom must be <=255 symbols']
        ],
        'inscription_email' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Inscription_email must be filled in'],
            ['rule' => 'email', 'value' => null, 'message' => 'Field Email must be email address'] 
        ],
        'inscription_motDePasse' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Inscription_motDePasse must be filled in'],
            ['rule' => 'min', 'value' => 8, 'message' => 'Field Nom must be >=8 symbols'],
            ['rule' => 'max', 'value' => 72, 'message' => 'Field Nom must be <=72 symbols']
        ], 
        'inscription_motDePasse_confirmation' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field Inscription_motDePasse_confirmation must be filled in'],
            ['rule' => 'min', 'value' => 8, 'message' => 'Field Nom must be >=8 symbols'],
            ['rule' => 'max', 'value' => 72, 'message' => 'Field Nom must be <=72 symbols']
        ], 
        'connexion_pseudo' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field connexion_pseudo must be filled in'],
            ['rule' => 'min', 'value' => 2, 'message' => 'Field Nom must be >=2 symbols'],
            ['rule' => 'max', 'value' => 255, 'message' => 'Field Nom must be <=255 symbols']
        ], 
        'connexion_motDePasse' => [
            ['rule' => 'required', 'value' => null, 'message' => 'Field connexion_motDePasse must be filled in'],
            ['rule' => 'min', 'value' => 8, 'message' => 'Field Nom must be >=8 symbols'],
            ['rule' => 'max', 'value' => 72, 'message' => 'Field Nom must be <=72 symbols']
        ],       
    ];
}
?>
