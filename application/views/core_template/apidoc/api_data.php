{
"type": "post",
"url": "/{table_name}/add",
"title": "Add {table_name_uc_no_space}.",
"version": "0.1.0",
"name": "Add{table_name}",
"group": "{table_name}",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>{table_name_uc_no_space} unique access-key.</p>"
}
<?php if ($x_token == 'yes') : ?>,
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>{table_name_uc_no_space} unique token.</p>"
}
<?php endif; ?>
]
}
},
"permission": [
{
"name": "{table_name_uc_no_space} Cant be Accessed permission name : api_{table_name}_add"
}
],
"parameter": {
"fields": {
"Parameter": [
<?php $i = 0;
foreach ($this->crud_builder->getFieldShowInAddForm(true) as $input => $options) {
  $mandatory = $this->crud_builder->getFieldValidation($input, 'required');
?>
  {
  "group": "Parameter",
  "type": "String",
  "optional": <?= $mandatory ? 'false' : 'true'; ?>,
  "field": "<?= ucwords($input); ?>",
  "description": "<p><?= $mandatory ? 'Mandatory' : 'Optional'; ?> <?= $input; ?> of {table_name_uc_no_space}s <?= $this->crud_builder->parseValidationFile($input, null, null); ?>.</p>"
  }<?= $i++ < count($this->crud_builder->getFieldShowInAddForm()) - 1 ? ',' : ''; ?>

<?php }; ?>
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/<?= ucfirst($table_name); ?>.php",
"groupTitle": "{table_name_uc_no_space}"
},
{
"type": "get",
"url": "/{table_name}/all",
"title": "Get all {table_name_uc_no_space}s.",
"version": "0.1.0",
"name": "All{table_name}",
"group": "{table_name}",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>{table_name_uc_no_space}s unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>{table_name_uc_no_space}s unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_{table_name_uc_no_space}_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of {table_name_uc_no_space}s.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of {table_name_uc_no_space}s.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of {table_name_uc_no_space}s.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "<?= $primary_key ?>",
"description": "<p>Sort data by this field. <?= implode(', ', $this->crud_builder->getFieldShowInDetailPage()) ?></p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code><?= $primary_key ?></code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of {table_name_uc_no_space}.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoData{table_name_uc_no_space}",
"description": "<p>{table_name_uc_no_space} data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/{table_name_uc_no_space}.php",
"groupTitle": "{table_name_uc_no_space}"
},
{
"type": "post",
"url": "/{table_name}/delete",
"title": "Delete {table_name_uc_no_space}.",
"version": "0.1.0",
"name": "Delete{table_name}",
"group": "{table_name}",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>{table_name_uc_no_space}s unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>{table_name_uc_no_space}s unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{table_name_uc_no_space} Cant be Accessed permission name : api_{table_name_uc_no_space}_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of {table_name_uc_no_space}s .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/{table_name_uc_no_space}.php",
"groupTitle": "{table_name_uc_no_space}"
},
{
"type": "get",
"url": "/{table_name}/detail",
"title": "Detail {table_name_uc_no_space}.",
"version": "0.1.0",
"name": "Detail{table_name}",
"group": "{table_name}",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>{table_name_uc_no_space}s unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>{table_name_uc_no_space}s unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{table_name_uc_no_space} Cant be Accessed permission name : api_{table_name_uc_no_space}_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of {table_name_uc_no_space}s.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of {table_name_uc_no_space}.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "{table_name_uc_no_space}NotFound",
"description": "<p>{table_name_uc_no_space} data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/{table_name_uc_no_space}.php",
"groupTitle": "{table_name_uc_no_space}"
},
{
"type": "post",
"url": "/{table_name}/update",
"title": "Update {table_name_uc_no_space}.",
"version": "0.1.0",
"name": "Update{table_name}",
"group": "{table_name}",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>{table_name_uc_no_space}s unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>{table_name_uc_no_space}s unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{table_name_uc_no_space} Cant be Accessed permission name : api_{table_name_uc_no_space}_update"
}
],
"parameter": {
"fields": {
"Parameter": [
<?php $i = 0;
foreach ($this->crud_builder->getFieldShowInAddForm(true) as $input => $options) {
  $mandatory = $this->crud_builder->getFieldValidation($input, 'required');
?>
  {
  "group": "Parameter",
  "type": "String",
  "optional": <?= $mandatory ? 'false' : 'true'; ?>,
  "field": "<?= ucwords($input); ?>",
  "description": "<p><?= $mandatory ? 'Mandatory' : 'Optional'; ?> <?= $input; ?> of {table_name_uc_no_space}s <?= $this->crud_builder->parseValidationFile($input, null, null); ?>.</p>"
  }<?= $i++ < count($this->crud_builder->getFieldShowInAddForm()) - 1 ? ',' : ''; ?>

<?php }; ?>
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/{table_name_uc_no_space}.php",
"groupTitle": "{table_name_uc_no_space}"
}