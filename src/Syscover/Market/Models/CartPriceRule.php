<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Models\Text;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class CartPriceRule
 *
 * Model with properties
 * <br><b>[id, name_text, description_text, status, has_coupon, coupon_code, combinable, uses_coupon, uses_customer, total_used, enable_from, enable_to, apply, discount_fixed_amount, discount_percentage, maximum_discount_amount, apply_shipping_amount, free_shipping, rules, data_lang]</b>
 *
 * @package     Syscover\Market\Models
 */

class CartPriceRule extends Model
{
    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_120_cart_price_rule';
    protected $primaryKey   = 'id_120';
    protected $suffix       = '120';
    public $timestamps      = false;
    protected $fillable     = ['id_120', 'name_text_120', 'description_text_120', 'active_120', 'has_coupon_120', 'coupon_code_120', 'combinable_120', 'uses_coupon_120', 'uses_customer_120', 'total_used_120', 'enable_from_120', 'enable_from_text_120', 'enable_to_120', 'enable_to_text_120', 'apply_120', 'discount_type_120', 'discount_fixed_amount_120', 'discount_percentage_120', 'maximum_discount_amount_120', 'apply_shipping_amount_120', 'free_shipping_120', 'rules_120', 'data_lang_120'];
    protected $maps         = [];
    protected $relationMaps = [
        'name_text' => \Syscover\Pulsar\Models\Text::class
    ];
    private static $rules   = [
        'name'          => 'required',
        'discountType'  => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query, $lang = null)
    {
        return $query->join('001_017_text', function ($join) use ($lang) {
                $join->on('012_120_cart_price_rule.name_text_120', '=', '001_017_text.id_017');
                if($lang !== null)  $join->where('001_017_text.lang_id_017', '=', $lang);
            });
    }

    public static function getTranslationRecord($parameters)
    {
        $cartPriceRule = CartPriceRule::builder($parameters['lang'])->where('id_120', $parameters['id'])->first();

        // al haber dos referencia a la misma tabla (001_017_text), menos la primera que la obtenemos por relación,
        // el resto la insertamos en el objeto de forma manual, realizando una consulta
        $cartPriceRule->description_text_text = Text::where('id_017', $cartPriceRule->description_text_120)->where('lang_id_017', $parameters['lang'])->first()->text_017;

        return $cartPriceRule;
    }

    /**
     * Get lang from Text object, that it has relation with name_text_120
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_017');
    }

    public static function addToGetIndexRecords($parameters)
    {
        $query =  CartPriceRule::builder($parameters['lang']);

        return $query;
    }

    /**
     * Override deleteTranslationRecord,
     * to avoid the deletion of language in the table 012_120_cart_price_rule, as it has no record of language
     */
    public static function deleteTranslationRecord($parameters)
    {
        CartPriceRule::deleteLangDataRecord($parameters);
    }
}