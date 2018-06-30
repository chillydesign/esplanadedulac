

<?php $categories = get_categories( array("hide_empty" => 0,   'taxonomy' => 'event_cat') ); ?>


<div  id="event_filters">

    <div class="container">

    <form  method="get">
        <div>
            <label for="search" >Rechercher</label>
            <input placeholder="rechercher" type="text" id="search" name="search" value="<?php echo $_GET['search']; ?>"  />
        </div>
        <div>
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $categorie) : ?>
                    <?php $selected = ($categorie->slug == $_GET['categorie'] ) ? 'selected' : ''; ?>
                    <option <?php echo $selected; ?> value="<?php echo $categorie->slug ;?>"><?php echo $categorie->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="for_families">En famille</label>
            <select name="for_families" id="for_families">
                <?php $selected = ( $_GET['for_families']  == '1' ) ? 'selected' : ''; ?>
                <option value="">Tous les évènements</option>
                <option <?php echo $selected; ?> value="1">À voir en famille</option>
            </select>
        </div>
        <!--
        <div>
            <label for="for_families" >
                <?php $checked =  'checked'; //( $_GET['for_families'] == '1' ) ? 'checked' : ''; ?>
                Only For families  <br>
                <input  <?php echo $checked; ?> type="checkbox" id="for_families" name="for_families" value="1"  />
                <span class="checkmark"></span>
            </label>

        </div> -->
        <div>
            <label for="">&nbsp;</label>
            <button  type="submit" >Chercher</button>
        </div>

    </form>
    </div>
</div>
