<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
	</ul>
</div>
<div class="groups form">
	<h2><?php echo __('Ordenación visual de grupos');?></h2>	
		<div id="todoslosgrupos">
		<?php echo $this->Html->link($this->Html->image('todos.png',array('title'=> 'Todos los productos')),
					array('controller'=>'products', 'action' =>'index'), array('escape'=>false));?>
		<center>Todos los productos</center>
		</div>
	<ul id="sortlist" >				
		
			
		<?php foreach ($groups as $group): ?>
		<li id="item_<?php echo $group['Group']['id'];?>">			
		<?php echo $this->Html->link($this->Html->image('/files/groups/'.$group['Group']['id'].STANDARD,array('title'=>$group['Group']['name'])),
			array('controller'=>'groups', 'action' =>'view',$group['Group']['id']), array('escape'=>false));?>
		<center><?php echo h($group['Group']['name']); ?>&nbsp;</center>
		</li>		
		<?php endforeach; ?>
	</ul>
		
</div>


<script type="text/javascript" language="javascript">
// <![CDATA[
Sortable.create("sortlist", {
    onUpdate: function() {
        new Ajax.Request("/productos/admin/groups/sort", {
            method: "post",
            parameters: { data: Sortable.serialize("sortlist") }
        });
    }
});
//]]>
</script>