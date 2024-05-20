<?php
$slider = get_field('slider');
if (!empty($slider) && isset($slider['slides'])) :
    $slides = $slider['slides'];
    if (!empty($slides)): ?>
        <div class="owl-carousel owl-theme position-relative">
            <?php foreach ($slides as $slide):
                $slideimage = $slide['slide'];
                ?>
                <div class="item item-img">
                    <img src="<?php echo esc_url($slideimage['url']); ?>"
                         alt="<?php echo esc_attr($slideimage['alt']); ?>" class="img-fluid">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif;
endif; ?>

<?php
$gallery = get_field('gallery');
if (!empty($gallery) && isset($gallery['items'])) :
    $items = $gallery['items'];
    if (!empty($items)): ?>

        <ul class="gallery-list d-flex flex-row list-inline list-unstyled my-1">
            <?php foreach ($items as $item):
                $galleryimg = $item['gallery_image'];
                $gallery_video_url = $item['has_video_link'];
                $galleryimgurl = $galleryimg['url'];
                ?>
                <li class="list-inline-item list-width-item<?php echo (!empty($gallery_video_url)) ? ' js-video list-width-item-wide is-video' : ' js-gallery'; ?>">
                    <a href="<?php echo esc_url(!empty($gallery_video_url) ? $gallery_video_url : $galleryimgurl); ?>"
                       class="<?php echo (!empty($gallery_video_url)) ? 'js-video' : 'js-gallery-item'; ?>">
                        <img src="<?php echo esc_url($galleryimg['url']); ?>"
                             alt="<?php echo esc_attr($galleryimg['alt']); ?>"
                             class="img-fluid  object-fit-cover">
                        <div class="cta position-absolute z-index-2 text-white">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="mb-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="157" height="157"
                                         viewBox="0 0 157 157" aria-hidden="true">
                                        <g id="Group_163" data-name="Group 163" transform="translate(-1335 -2910)">
                                            <g id="Ellipse_27" data-name="Ellipse 27" transform="translate(1335 2910)"
                                               fill="none" stroke="#fff" stroke-width="11">
                                                <circle cx="78.5" cy="78.5" r="78.5" stroke="none"/>
                                                <circle cx="78.5" cy="78.5" r="73" fill="none"/>
                                            </g>
                                            <g id="Polygon_15" data-name="Polygon 15"
                                               transform="translate(1464.139 2944.954) rotate(90)" fill="#fff">
                                                <path
                                                    d="M 73.42989349365234 72.04489135742188 L 13.76300811767578 72.04489135742188 C 11.9453649520874 72.04489135742188 11.0413646697998 70.82727813720703 10.73707962036133 70.30377960205078 C 10.43277931213379 69.78028106689453 9.822136878967285 68.39215087890625 10.72170829772949 66.81270599365234 L 40.55513763427734 14.43236255645752 C 41.46389389038086 12.83680629730225 42.9847526550293 12.66454887390137 43.59645080566406 12.66454887390137 C 44.20813751220703 12.66454887390137 45.7289924621582 12.8367919921875 46.63773727416992 14.43234825134277 L 76.47119140625 66.81270599365234 C 77.37076568603516 68.39215087890625 76.76012420654297 69.78028106689453 76.45582580566406 70.30377960205078 C 76.15153503417969 70.82727813720703 75.24753570556641 72.04489135742188 73.42989349365234 72.04489135742188 Z"
                                                    stroke="none"/>
                                                <path
                                                    d="M 43.59644317626953 18.18510437011719 L 15.48339080810547 67.54488372802734 L 71.70949554443359 67.54488372802734 L 43.59644317626953 18.18510437011719 M 43.59643936157227 8.164543151855469 C 46.30508041381836 8.164543151855469 49.01372146606445 9.511444091796875 50.54799270629883 12.20524597167969 L 80.38143157958984 64.58560180664062 C 83.41899108886719 69.91880035400391 79.56745147705078 76.54488372802734 73.42989349365234 76.54488372802734 L 13.76300811767578 76.54488372802734 C 7.625450134277344 76.54488372802734 3.773910522460938 69.91880035400391 6.811447143554688 64.58560180664062 L 36.64488983154297 12.20524597167969 C 38.17916107177734 9.511444091796875 40.8878021240233 8.164543151855469 43.59643936157227 8.164543151855469 Z"
                                                    stroke="none" fill="#fff"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <p class="mb-0">Watch Video</p>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif;
endif; ?>
