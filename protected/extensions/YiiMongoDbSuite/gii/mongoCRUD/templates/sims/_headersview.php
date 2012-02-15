<table class="bordered-table zebra-striped">
	<tr>
		<?php
		$count=0;
		foreach($this->modelObject->attributeNames() as $name)
		{
			if($name == $this->modelObject->primaryKey())
			{
				echo "<td class='span2'>\n\t\t\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$name}')); ?></b>\n\t\t</td>\n";
				continue;
			}
			if(++$count==7)
				echo "\t\t<?php /*\n";
			echo "\t\t<td >\n\t\t\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$name}')); ?></b>\n\t\t</td>\n";
		}
		if($count>=7)
			echo "\t\t*/ ?>\n";
			
		?>
	</tr>