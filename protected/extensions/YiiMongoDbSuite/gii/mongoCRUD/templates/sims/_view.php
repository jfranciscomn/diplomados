<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
	<tr>
<?php
/*echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n";
*/
$count=0;
foreach($this->modelObject->attributeNames() as $name)
{
	if($name == $this->modelObject->primaryKey())
	{
		echo "\t\t<td>\n\t\t\t<?php echo CHtml::link(CHtml::encode(\$data->{$name}), array('view', 'id'=>\$data->{$name})); ?>\n\t\t</td>\n";
		continue;
	}
	if(++$count==7)
		echo "\t\t<?php /*\n";
	/*echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";*/
	echo "\t\t<td>\n\t\t\t<?php echo CHtml::encode(\$data->{$name}); ?>\n\t\t</td>\n";
}
if($count>=7)
	echo "\t\t*/ ?>\n";
?>
	</tr>