<div id="footer">
    <div class="container">
        <div class="twelve columns footer">
            <div class="left">
                <img src="$ThemeDir/images/logo.png" alt="logo" title="logo" />
            </div>
            <div class="centre">
                <div id="corporateLogos">
                    <img src="$ThemeDir/images/citycouncil.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/county.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/eastcambs.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/fen.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/gcgplep.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/hunts.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/peterborough.jpg" alt="logo" title="logo" />
                    <img src="$ThemeDir/images/southcambs.jpg" alt="logo" title="logo" />
                </div>
            </div>
            <div class="right">
                <ul>
                <% loop $FooterLinks %>
                    <li><a href="$URL" title="$LinkText">$LinkText</a></li>
                <% end_loop %>
                </ul>
            </div>            
            <div id="colophonFooter">
                <div class="colophon corp">
                    <p>All content &copy; $Now.Year $SiteConfig.Title</p>
                </div>
                <div class="colophon us">
                    <p>
                        design - squircle creative | website - adrian lynch &copy; $Now.Year
                    </p>
                </div>            
        </div>
    </div>
</div>
<% with $SiteConfig.Backgrounds %>
<div id="backgroundImages" class="hidden">
    <ul id="bimages">
    <% loop $SiteConfig.Backgrounds %>
        <li>
            <img src="$BackgroundImage.CroppedImage(1520,400).URL" />
        </li>
    <% end_loop %>
    </ul>
<% end_with %>
</div>
<% with $SiteConfig.MobileBackgrounds %>
<div id="mobileBackgroundImages" class="hidden">
    <ul id="mbimages">
    <% loop $SiteConfig.MobileBackgrounds %>
        <li>
            <img src="$BackgroundImage.CroppedImage(600,515).URL" />
        </li>
    <% end_loop %>
    </ul>
<% end_with %>
</div>
