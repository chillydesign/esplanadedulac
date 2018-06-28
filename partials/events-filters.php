

<?php $categories = get_categories( array("hide_empty" => 0,   'taxonomy' => 'event_cat') ); ?>


<div  id="event_filters">

    <div class="container">

    <form  method="get">
        <div>
            <label for="search" >Search</label>
            <input placeholder="search" type="text" id="search" name="search" value="<?php echo $_GET['search']; ?>"  />
        </div>
        <div>
            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                <option value="">All categories</option>
                <?php foreach ($categories as $categorie) : ?>
                    <?php $selected = ($categorie->slug == $_GET['categorie'] ) ? 'selected' : ''; ?>
                    <option <?php echo $selected; ?> value="<?php echo $categorie->slug ;?>"><?php echo $categorie->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="for_families" >
                <?php $checked = ( $_GET['for_families'] == '1' ) ? 'checked' : ''; ?>
                Only For families  <br>
                <input  <?php echo $checked; ?> type="checkbox" id="for_families" name="for_families" value="1"  />
            </label>
        </div>
        <div>
            <label for="">&nbsp;</label>
            <button  type="submit" >Filter</button>
        </div>

    </form>
    </div>
</div>
