
<?php 
  if(isset($_POST['recover']) && $_POST['recover'] != ""){
    echo "reading data: ".$_POST['recover'];
    $recoveredData = file_get_contents('archive/'.$_POST['recover']);
    $recoveredArray = unserialize($recoveredData);
    $_POST = $recoveredArray;

  }elseif(isset($_POST['client']) && $_POST['client'] != ""){
    echo "setting data: ". $_POST['client'].'-'.$_POST['project'].'.txt';
    $serializedData = serialize($_POST);
    file_put_contents('archive/'.$_POST['client'].'-'.$_POST['project'].'.txt', $serializedData);
  }

?>



<?php
  $items = array(
    array(
      'label' => 'Core',
      'name' => 'core',
      'items' => array(
        'Wordpress is up to date',
      )
    ),
    array(
      'label' => 'Plugins',
      'name' => 'plugins',
      'items' => array(
        'All plugins are up to date',
      )
    ),
    array(
      'label' => 'Themes',
      'name' => 'themes',
      'items' => array(
        'All default themes are up to date',
      )
    ),
    array(
      'label' => 'Translations',
      'name' => 'translations',
      'items' => array(
        'All translations are up to date',
      )
    ),
    array(
      'label' => 'SSL',
      'name' => 'ssl',
      'items' => array(
        'Site uses SSL',
        'Qualys SSL Checker (https://ssllabs.com/ssltest/analyze.html)',
      )
    ),
    array(
      'label' => 'Security',
      'name' => 'security',
      'items' => array(
        'Approved security plugin is installed and configured properly',
        'No extraneous files in wordpress',
        'No PHP files in wp-content/uploads',
        'Proper file permissions are set throughout the site',
        'No unsafe upload forms on the site',
        'Securi Site Checker (https://sitecheck.sucuri.net/)',
      )
    ),
    array(
      'label' => 'Spam',
      'name' => 'spam',
      'items' => array(
        'All website forms use CAPTCHA',
        'No "mailto:" links',
        'All Email addresses are hidden with javascript (PHPEnkoder)',
        'All Phone numbers are hidden with javascript (PHPEnkoder)',
        'Open registration is turned off',
        'Comments are turned off on all posts',
        'Pingbacks are turned off on all posts',
      )
    ),
    array(
      'label' => 'W3 Compliance / Accessibility',
      'name' => 'w3c',
      'items' => array(
        'No errors from W3C Validator (https://validator.w3.org/)',
        'No broken links were found (https://validator.w3.org/checklink)',
        'No broken images were found',
      )
    ),
    array(
      'label' => 'Speed Optimization',
      'name' => 'optimization',
      'items' => array(
        'Single minified CSS',
        'Single minified Javascript',
        'Optimized image sizes',
        'Javascript is loaded at the bottom of DOM',
        'Site caching is installed and configured properly',
        'Pingdom Website Speed Test (https://tools.pingdom.com)',
        'Page load time',
      )
    ),
    array(
      'label' => 'SEO',
      'name' => 'seo',
      'items' => array(
        'Approved SEO plugin is installed and configured properly',
        'Sitemap exists and is accurate',
        'Website is registered with Google Webmaster Tools and configured',
        'Registered at Google places for physical locations',
        'SeoSite Checkup (http://seositecheckup.com)',
      )
    ),
    array(
      'label' => 'Backups',
      'name' => 'backups',
      'items' => array(
        'File, DB, and Code backups are scheduled and enabled',
        'Backups are offsite',
      )
    ),
    array(
      'label' => 'Theme',
      'name' => 'theme',
      'items' => array(
        'Code is clean - no arbitrary functions',
        'Code is formatted - code is nicely formatted',
        'Code is commented / readable - code is commented and readable',
        'File organization - code is where you’d expect it to be',
        'Template Hierarchy - logical and clear',
        'CSS is organized, understandable, and updateable (no !important’s)',
        'Javascript is organized, understandable, and updateable',
        'Plugin dependencies and Theme dependencies',
      )
    ),
    array(
      'label' => 'Social Media',
      'name' => 'socialmedia',
      'items' => array(
        'Check social media (http://seositecheckup.com/seo-audit/social-media-check)',
        'Facebook (https://developers.facebook.com/tools/debug/)',
        'Twitter',
        'LinkedIn',
        'Google+',
        'YouTube',
        'Pinterest',
        'Instagram',
        'Tumblr',
        'Flickr',
        'Reddit',
      )
    ),
    array(
      'label' => 'Hosting',
      'name' => 'hosting',
      'items' => array(
        'Hosting plan cost is appropriate',
        'Server hardware is sufficient',
        'Host allows SSH access',
        'Host is reputable',
      )
    ),
    array(
      'label' => 'DNS',
      'name' => 'dns',
      'items' => array(
        'Domain name provider is reputable',
        'Domain name provider allows IPV6',
        'DNS routing is direct and simple',
        'DNS Checker Tool (http://dnscheck.pingdom.com/) ',
      )
    ),
    array(
      'label' => 'Responsive',
      'name' => 'responsive',
      'items' => array(
        'Responsive layout',
        'Touch responsive',
      )
    ),
    array(
      'label' => 'Analytics',
      'name' => 'analytics',
      'items' => array(
        'Google analytics enabled',
      )
    ),
    array(
      'label' => 'Kitestrings',
      'name' => 'kitestrings',
      'items' => array(
        'Passwords are saved in Kitestrings',
      )
    ),
    array(
      'label' => 'GIT',
      'name' => 'git',
      'items' => array(
        'Project is version controlled',
      )
    ),
  );
?>

<!DOCTYPE html>
<html>
<head>
  <title>WP Website Health Check</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
  <style type="text/css">

    .bg-critical { background: #f12707 !important; }
    .bg-fail     { background: #ff7d0d !important; }
    .bg-warning  { background: #e0de1b !important; }
    .bg-notice   { background: #5790ec !important; }
    .bg-pass     { background: #2fde34 !important; }
    .bg-na       { background: #dadada !important; color: black !important;}

    .text-critical { color: #f12707 !important; }
    .text-fail     { color: #cc6207 !important; }
    .text-warning  { color: #8c8b1e !important; }
    .text-notice   { color: #5790ec !important; }
    .text-pass     { color: #16af1a !important; }

    .callout { border: 0; margin: 0;}
    .print-only { display: none; }

    body * { -webkit-print-color-adjust: exact; }

    @media print {
      @page       { size: landscape; }
      body        { font-size: 12px; }
      input       { display: none !important; }
      .print-only { display: inline-block !important; }
    }

  </style>
</head>
<body>
  <form method="POST">
    <br />
    <div class="row">
      <div class="column small-6">
        <img src="https://storage.googleapis.com/mri-assets/MRI-logo-2015.svg" width="250">
      </div>
      <div class="column small-6 text-right">
        <h4>Wordpress Website Health Check</h4>
      </div>
    </div>

    <hr />

    <div class="row">
      <div class="callout secondary">

        <div class="row">
          <div class="columns small-4">
            <label>Client</label>
            <input type="text" name="client" placeholder="Client" value="<?php echo ( empty($_POST['client']) ? '' : $_POST['client'] ); ?>"></input>
            <?php echo ( empty($_POST['client']) ? '' : '<h4 class="print-only">'.$_POST['client'].'</h4>' ); ?>
          </div>
          <div class="columns small-4">
            <label>Project</label>
            <input type="text" name="project" placeholder="Project" value="<?php echo ( empty($_POST['project']) ? '' : $_POST['project'] ); ?>"></input>
            <?php echo ( empty($_POST['project']) ? '' : '<h4 class="print-only">'.$_POST['project'].'</h4>' ); ?>
          </div>
          <div class="columns small-4">
            <label>Date</label>
            <h4><?php echo Date('F j, Y'); ?></h4>
          </div>
        </div>

        <table>
          <tbody>
            <tr>
              <th class="bg-critical">Critical</th>
              <td>Requires immediate attention. Your website is at serious risk until this issue is addressed.</td>
            </tr>
            <tr>
              <th class="bg-fail">Fail</th>
              <td>Important issue to be fixed. This should be taken care of to ensure site stability and/or security.</td>
            </tr>
            <tr>
              <th class="bg-warning">Warning</th>
              <td>Should be fixed for optimium performance, stability, and security. Poses low immediate risk.</td>
            </tr>
            <tr>
              <th class="bg-notice">Notice</th>
              <td>Should be noted, but poses very low immediate risk. Some websites may require specific configuration settings that require this.</td>
            </tr>
            <tr>
              <th class="bg-pass">Pass</th>
              <td>Health check passed!</td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php $files = scandir('archive'); ?>
      <div class="row"><h5 class="columns small-12">RECOVER DATA</h5></div>
    
      <select name="recover">
        
        <option value=""></option>
        <?php for($i=2; $i<count($files); $i++): ?>
          <option value="<?= $files[$i] ?>"><?= $files[$i] ?></option>
        <?php endfor; ?>
        
      </select>
    </div>

    <br />

    <?php foreach($items as $scope_count => $scope) : ?>
      <div class="row">

        <div class="row"><h5 class="columns small-12"><?php echo $scope['label']; ?></h5></div>

        <div class="row">
          <div class="columns small-2"><small>Status</small></div>
          <div class="columns small-5"><small>Description</small></div>
          <div class="columns small-5"><small>Comments</small></div>
        </div>

        <?php foreach($scope['items'] as $item_count => $item) : $index = "index-{$scope_count}-{$item_count}"; ?>
          <div class="row">
            <div class="columns small-2">
              <?php if(empty($_POST[$index]['status'])) : ?>
                <select name="<?php echo $index; ?>[status]">
                  <option value=""></option>
                  <option value="critical">Critical</option>
                  <option value="fail">Fail</option>
                  <option value="warning">Warning</option>
                  <option value="notice">Notice</option>
                  <option value="pass">Pass</option>
                  <option value="na">N/A</option>
                </select>
              <?php else : ?>
                <div class="button expanded bg-<?php echo $_POST[$index]['status']; ?>">
                  <strong><?php echo strtoupper($_POST[$index]['status']); ?></strong>
                </div>
                <input type="hidden" name="<?php echo $index; ?>[status]" value="<?php echo $_POST[$index]['status']; ?>"></input>

              <?php endif; ?>
            </div>

            <div class="columns small-5"><?php echo $item; ?></div>

            <div class="columns small-5">
              <?php if(empty($_POST[$index]['comments'])) : ?>
                <textarea name="<?php echo $index; ?>[comments]"></textarea>
              <?php else : ?>
                <?php echo $_POST[$index]['comments']; ?>
                <input type="hidden" name="<?php echo $index; ?>[comments]" value="<?php echo htmlspecialchars($_POST[$index]['comments']); ?>"></input>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
        <hr />
      </div>
    <?php endforeach; ?>

    <div class="row">
      <br />
      <input type="submit" class="button large columns small-12" value="Generate Report"></input>
    </div>
  </form>

</body>
</html>
  