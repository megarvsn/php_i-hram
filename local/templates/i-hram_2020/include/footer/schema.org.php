<div style="display:none;" itemscope="" itemtype="http://schema.org/Organization">
    <span itemprop="name"><?= $CSiteGetByID['SITE_NAME'] ?></span>
    <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
        <span itemprop="streetAddress"><?= $address ?></span>
        <span itemprop="postalCode"><?= $index ?></span>
        <span itemprop="addressRegion"><?= $city ?></span>
        <span itemprop="addressLocality"><?= $city ?></span>
    </div>
    <span itemprop="telephone"><?= $phone ?></span>
    <span itemprop="email"><a href="mailto:<?= $email ?>"><?= $email ?></a></span>
    <span><a href="//<?= SITE_SERVER_NAME ?>/" itemprop="url"><?= SITE_SERVER_NAME ?></a></span>
    <img itemprop="logo" src="//<?= SITE_SERVER_NAME ?>/images/logo.png">
    <div itemscope="" itemtype="http://schema.org/GeoCoordinates">
        <meta itemprop="latitude" content="<?= $latitude ?>">
        <meta itemprop="longitude" content="<?= $longitude ?>">
    </div>
</div>
<?= PHP_EOL ?>