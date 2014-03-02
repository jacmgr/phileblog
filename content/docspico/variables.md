/*
Title: Variables
Description: Using Variables in jaccms
Chapter: 4
*/
## VARIABLESXXXXX

Variables include the [page data variables](frontmatter) and the **config variables**. You can include them in your content and in your layouts and templates.
This is handled in the jaccms_core plugin before_parse hook.
### In the Content
<small> base_url var can't be shown as literal in code block because pico core substitutes it</small>

From the Config Variables:

    * Baseurl is: \% base_url %
    * Site Title is: \%site_title%

From the Page Data Variables you can show any meta data

    * Page Title is \%title%
    * Description is \%description%
    
As an example for this site the parsed content is:

* Baseurl is: %base_url%
* Site Title is: %site_title%
* Description is: %description%
* Page Title is: %title%

### In the Templates/Layouts

All the variables are avaialbel in the templates and layouts.  Depending on if you are using TWIG or PHP, the variables are:

<div class="table table-bordered">

<table>
<thead>
<tr>
  <th align="center">name</th>
  <th align="center">TWIG</th>
  <th align="center">PHP</th>
  <th align="center">Description</th>
</tr>
</thead>
<tbody>
<tr>
  <td align="center">config</td>
  <td align="center">{{ config.configitemname }}</td>
  <td align="center">$config['configitemname']</td>
  <td align="center">Array of All config values</td>
</tr>
<tr>
  <td align="center">base_dir</td>
  <td align="center">{{ base_dir }}</td>
  <td align="center">$base_dir</td>
  <td align="center"></td>
</tr>
<tr>
  <td align="center">base_url</td>
  <td align="center">{{ base_url }}</td>
  <td align="center">$base_url</td>
  <td align="center"></td>
</tr>
<tr>
  <td align="center">theme_dir</td>
  <td align="center">{{ theme_dir }}</td>
  <td align="center">$theme_dir</td>
  <td align="center"></td>
</tr>
<tr>
  <td align="center">theme_url</td>
  <td align="center">{{ theme_url }}</td>
  <td align="center">$theme_url</td>
  <td align="center"></td>
</tr>
<tr>
  <td align="center">meta</td>
  <td align="center">{{ meta.metaitemname }}</td>
  <td align="center">$meta['metaitemname']</td>
  <td align="center">Array of Current Page Meta Data</td>
</tr>
<tr>
  <td align="center">content</td>
  <td align="center">{{ content }}</td>
  <td align="center">$content</td>
  <td align="center">Current Page parsed content</td>
</tr>
<tr>
  <td align="center">pages</td>
  <td align="center">{{ pages }}</td>
  <td align="center">$pages</td>
  <td align="center">Array of all pages meta data</td>
</tr>
</tbody>
</table>

</div>    

> Look over all the layouts and templates to see how to use these.
  