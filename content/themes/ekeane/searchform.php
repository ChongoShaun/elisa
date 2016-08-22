<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div id="search-inputs">
<input type="text" size="15" class="search-field" name="s" id="s" placeholder="SEARCH" onfocus="if(this.value == 'SEARCH') {this.value = '';}" onblur="if (this.value == '') {this.value = 'SEARCH';}">
<input type="submit" id="searchsubmit" value="Search" />
</div>
</form>