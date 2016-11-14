<h2>Editar Usuario</h2>

<?php
//print_r($user);

?>

<form action="<?php echo APP_URL."/users/edit"; ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user["username"]; ?>">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="newPassword">
    </p>
    <p>
         <label for="type_id">Types</label>
        <select name="type_id" id="type_id">
            <?php
            foreach ($types as $type):
                if($type["types"]["id"]
                   == $user["types"] ["id"]) { ?>
            <option selected value="<?php echo $type["types"]["id"];?>">
            <?php echo $type ["types"] ["name"];?>
            </option>
                    
                <?php }else{?>
            <option value="<?php echo $type["types"]["id"];?>">
            <?php echo $type ["types"] ["name"];?>
            </option>
           <?php }?>
            
            <?php endforeach;?>
        </select>
    </p>
    <p>
        <input type="submit">
    </p>

</form>
