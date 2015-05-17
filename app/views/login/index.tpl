{include file="../common/header.tpl"}
<div class="container">
<div class="row">
<div class="col-sm-4"> </div>
<div class="col-sm-4">

<form class="bs-component" id="login" name="lgin" method="post">
<h3>{cap}{$title}{/cap}</h3>
<div class="form-group">
    
    <input class="form-control input-sm" type="text" id="inputSmall" name="uid" value="{$post['uid']|default:null}" placeholder="User ID">
</div>
<div class="form-group">
    
    <input class="form-control input-sm" type="password" id="inputSmall" name="upw" placeholder="Password">
</div>
<div class="form-group">

  <button type="submit" class="btn btn-success">{cap}login{/cap}</button>
  <button type="reset" class="btn btn-default">{cap}cancel{/cap}</button>
  <p class="alert_red">{cap}{$err|default:null}{/cap}</p>
</div>
<input type="hidden" name="token" value="{$token}" />
</form>
</div>
<div class="col-sm-4"> </div>
</div>
</div>
<script type="text/javascript">
window.onload = function(){
	
	if(window.parent.location != "{$topurl}"){
		window.parent.location.replace("{$topurl}");
	}
	var flds = document.getElementsByTagName("INPUT");
}

</script>
{include file="../common/footer.tpl"}