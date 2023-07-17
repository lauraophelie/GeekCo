<!DOCTYPE html>
<html lang="en">
<head>
    <title>update offre</title>
</head>
<body>
    <h2>Modifier l'offre</h2>
    <form action="<?php echo site_url("offre/updateOffre/" . $offre['id']); ?>" method="post">
        <div>
            <textarea name="offre" cols="30" rows="5" placeholder="Votre texte"><?php echo $offre['texte']; ?></textarea>
        </div>
        <div>
             Lieu:
            <select name="lieu">
                <?php foreach ($lieux as $lieu) { ?>
                    <option value="<?php echo $lieu['nom']; ?>" <?php if($lieu['nom'] == $offre['idlieu']) echo 'selected'; ?>><?php echo $lieu['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            Type:
            <select name="type">
                <?php foreach ($types as $type) { ?>
                    <option value="<?php echo $type['nom']; ?>" <?php if($type['nom'] == $offre['idtypeoffre']) echo 'selected'; ?>><?php echo $type['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="date">
             Date:
             <input type="datetime-local" name="dateFin" value="<?php echo date('Y-m-d\TH:i', strtotime($offre['datedefinvalidite'])); ?>">
        </div>
        <div id="sub">
            <input type="submit" value="enter">
        </div>
    </form>
</body>
</html>
