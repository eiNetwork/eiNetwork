{assign var=propDisplayFormat value=$property.displayFormat}
<input type='text' name='{$propName}' id='{$propName}' value='{$propValue|string_format:$propDisplayFormat}'></input>