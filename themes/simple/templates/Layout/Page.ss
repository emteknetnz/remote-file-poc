<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>

	<% if $MyRemoteFile %>
		<a href="$MyRemoteFile.AbsoluteLink">$MyRemoteFile.AbsoluteLink</a><br>
		<img src="$MyRemoteFile.AbsoluteLink">
	<% end_if %>
</div>
