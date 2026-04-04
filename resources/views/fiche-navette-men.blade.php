<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>FICHE NAVETTE</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f5f5f5;
    padding:20px;
}
.page{
    width:900px;
    margin:auto;
    background:#fff;
    padding:30px;
    border:1px solid #000;
}
h1{
    text-align:center;
    margin-bottom:10px;
}
.section-title{
    font-weight:bold;
    margin-top:25px;
    border-bottom:2px solid #000;
    padding-bottom:5px;
}
.row{
    display:flex;
    gap:10px;
    margin-top:10px;
}
.field{
    flex:1;
}
label{
    font-size:13px;
    font-weight:bold;
}
input{
    width:100%;
    padding:5px;
    border:1px solid #000;
    font-size:13px;
}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
table th, table td{
    border:1px solid #000;
    padding:6px;
    font-size:13px;
    text-align:center;
}
@media print{
    body{background:#fff;}
}
</style>
</head>

<body>

<div class="page">

<h1>FICHE NAVETTE</h1>

<!-- IDENTIFICATION PATIENT -->
<div class="section-title">IDENTIFICATION DU PATIENT</div>

<div class="row">
    <div class="field">
        <label>1. N° d’admission</label>
        <input type="text">
    </div>
    <div class="field">
        <label>2. Date de naissance</label>
        <input type="date">
    </div>
    <div class="field">
        <label>3. Groupe sanguin</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>4. Nom</label>
        <input type="text">
    </div>
    <div class="field">
        <label>5. Nom de jeune fille</label>
        <input type="text">
    </div>
    <div class="field">
        <label>6. Prénom</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>7. Adresse</label>
        <input type="text">
    </div>
</div>

<!-- IDENTIFICATION ASSURE -->
<div class="section-title">IDENTIFICATION DE L’ASSURÉ</div>

<div class="row">
    <div class="field">
        <label>8. Caisse</label>
        <input type="text">
    </div>
    <div class="field">
        <label>9. Matricule assuré</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>10. Nom, Prénom</label>
        <input type="text">
    </div>
    <div class="field">
        <label>11. Date de naissance</label>
        <input type="date">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>12. Qualité du malade</label>
        <input type="text">
    </div>
    <div class="field">
        <label>13. Nom</label>
        <input type="text">
    </div>
    <div class="field">
        <label>14. Prénom</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>15. N° prise en charge</label>
        <input type="text">
    </div>
    <div class="field">
        <label>16. Date</label>
        <input type="date">
    </div>
</div>

<!-- SERVICE -->
<div class="section-title">SERVICE D’HOSPITALISATION</div>

<div class="row">
    <div class="field">
        <label>17. Service</label>
        <input type="text">
    </div>
    <div class="field">
        <label>18. Chef de service</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>19. Date d’entrée</label>
        <input type="date">
    </div>
    <div class="field">
        <label>20. Heure d’entrée</label>
        <input type="time">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>21. N° de salle</label>
        <input type="text">
    </div>
    <div class="field">
        <label>22. N° de lit</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>23. Médecin traitant</label>
        <input type="text">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>24. Mode d’entrée</label>
        <input type="text">
    </div>
    <div class="field">
        <label>25. Code d’entrée</label>
        <input type="text">
    </div>
</div>

<!-- MOUVEMENT -->
<div class="section-title">HOSPITALISATION DANS UN AUTRE SERVICE</div>

<table>
<tr>
    <th>26. Service</th>
    <th>27. Date</th>
    <th>28. Heure</th>
    <th>29. Salle / Lit</th>
    <th>30. Médecin</th>
</tr>
<tr>
    <td><input></td>
    <td><input type="date"></td>
    <td><input type="time"></td>
    <td><input></td>
    <td><input></td>
</tr>
<tr>
    <td><input></td>
    <td><input type="date"></td>
    <td><input type="time"></td>
    <td><input></td>
    <td><input></td>
</tr>
</table>

</div>

</body>
</html>
