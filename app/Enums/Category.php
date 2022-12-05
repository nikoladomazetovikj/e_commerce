<?php

namespace App\Enums;

enum Category : int
{
    // this will be default categories  for the seeds
    case FLAX_SEED = 1;
    case SESAME_SEED = 2;
    case SUNFLOWER_SEED = 3;
    case CHIA_SEED = 4;
    case HEMP_SEED = 5;
    case PUMPKIN_SEED = 6;
    case POMEGRANATE_SEED = 7;
    case QUINOA = 8;
    case PINE_NUTS = 9;
    case CARAWAY_SEED = 10;
}
