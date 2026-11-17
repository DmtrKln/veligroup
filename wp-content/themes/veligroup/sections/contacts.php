<?php
$fields = get_fields('option') ?: [];
?>
<section class="contacts" id="contacts">
    <div class="container">
        <div class="contacts__wrapp">
            <div class="contacts__info">
                <h2 class="contacts__title"><?= $fields['contacts_title'] ?></h2>
                <p class="contacts__subtitle"><?= $fields['contacts_subtitle'] ?></p><a class="contacts__phone" href="tel:<?= preg_replace('/[^\d+]/', '', $fields['contacts_phone']) ?>"><?= $fields['contacts_phone'] ?></a>
                <div class="contacts__card">
                    <div class="contacts__row"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.4014 14.5336C9.64127 13.4628 13.3336 9.99581 13.3336 6.66683C13.3336 5.25222 12.7717 3.89554 11.7716 2.89525C10.7715 1.89496 9.41512 1.33301 8.00077 1.33301C6.58642 1.33301 5.23 1.89496 4.22991 2.89525C3.22982 3.89554 2.66797 5.25222 2.66797 6.66683C2.66797 9.99581 6.36027 13.4628 7.60014 14.5336C7.71565 14.6204 7.85625 14.6674 8.00077 14.6674C8.14529 14.6674 8.28589 14.6204 8.4014 14.5336Z" stroke="#F4D85D" stroke-width="2" stroke-linecap="round" />
                            <circle cx="8" cy="6.667" r="1.333" stroke="#F4D85D" stroke-width="2" />
                        </svg>
                        <p><?= $fields['contacts_address'] ?></p>
                    </div><a class="contacts__row contacts__row--phone" href="tel:<?= preg_replace('/[^\d+]/', '', $fields['contacts_phone'] ?? '') ?>"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_709_3192)">
                                <path d="M9.66049 11.0867C9.51349 11.1235 9.35836 11.109 9.22066 11.0458C7.3688 10.1369 5.87018 8.64017 4.95899 6.78944C4.8915 6.65102 4.87402 6.4935 4.90951 6.34364C4.945 6.19379 5.03127 6.06084 5.15367 5.96738L5.4657 5.73336C5.6313 5.60915 5.76572 5.4481 5.8583 5.26294C5.95087 5.07779 5.99907 4.87362 5.99907 4.66661V2.66645C5.99907 2.3128 5.85858 1.97363 5.60852 1.72356C5.35845 1.47349 5.01928 1.33301 4.66563 1.33301H2.66547C2.31182 1.33301 1.97266 1.47349 1.72259 1.72356C1.47252 1.97363 1.33203 2.3128 1.33203 2.66645C1.33203 5.8493 2.59641 8.90179 4.84703 11.1524C7.09765 13.403 10.1501 14.6674 13.333 14.6674C13.6866 14.6674 14.0258 14.5269 14.2759 14.2769C14.5259 14.0268 14.6664 13.6876 14.6664 13.334V11.3338C14.6664 10.9802 14.5259 10.641 14.2759 10.3909C14.0258 10.1409 13.6866 10.0004 13.333 10.0004H11.3328C11.1258 10.0004 10.9217 10.0486 10.7365 10.1411C10.5513 10.2337 10.3903 10.3681 10.2661 10.5337L10.0294 10.8438C9.93761 10.9643 9.8075 11.05 9.66049 11.0867Z" stroke="#F4D85D" stroke-width="2" stroke-linecap="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_709_3192">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg> <span><?= $fields['contacts_phone'] ?></span></a><a class="contacts__route" href="<?= esc_url($fields['contacts_route_url'] ?? '') ?>" target="_blank" rel="noopener"><span>Схема проезда</span> <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_709_3198)">
                                <path d="M11 0.999512L1.5 5.49951L5.5 6.49951L6.5 10.4995L11 0.999512Z" stroke="white" stroke-width="2" stroke-linecap="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_709_3198">
                                    <rect width="12" height="12" fill="white" />
                                </clipPath>
                            </defs>
                        </svg></a>
                </div>
            </div>
            <div class="contacts__map" data-interactive-map>
                <button
                    class="btn-reset contacts__overlay"
                    type="button"
                    title="Включить взаимодействие с картой">
                    <span>Нажмите для взаимодействия с картой</span>
                </button>

                <?= $fields['contacts_map'] ?? '' ?>
            </div>
        </div>
    </div>
</section>
