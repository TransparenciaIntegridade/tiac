<?php /* Smarty version 2.6.27, created on 2016-02-03 22:34:23
         compiled from string:%7Bif+%24receipt_text%7D%0A%7B%24receipt_text%7D%0A%7B/if%7D%0A%7Bif+%24is_pay_later%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24pay_later_receipt%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Belse%7D%0A%0A%7Bts%7DPlease+print+this+receipt+for+your+records.%7B/ts%7D%0A%7B/if%7D%0A%0A%7Bif+%24amount%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DContribution+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bif+%24lineItem+and+%24priceSetID+and+%21%24is_quick_config%7D%0A%7Bforeach+from%3D%24lineItem+item%3Dvalue+key%3Dpriceset%7D%0A---------------------------------------------------------%0A%7Bcapture+assign%3Dts_item%7D%7Bts%7DItem%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_qty%7D%7Bts%7DQty%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_each%7D%7Bts%7DEach%7B/ts%7D%7B/capture%7D%0A%7Bif+%24dataArray%7D%0A%7Bcapture+assign%3Dts_subtotal%7D%7Bts%7DSubtotal%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_taxRate%7D%7Bts%7DTax+Rate%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_taxAmount%7D%7Bts%7DTax+Amount%7B/ts%7D%7B/capture%7D%0A%7B/if%7D%0A%7Bcapture+assign%3Dts_total%7D%7Bts%7DTotal%7B/ts%7D%7B/capture%7D%0A%7B%24ts_item%7Cstring_format:%22%25-30s%22%7D+%7B%24ts_qty%7Cstring_format:%22%255s%22%7D+%7B%24ts_each%7Cstring_format:%22%2510s%22%7D+%7Bif+%24dataArray%7D+%7B%24ts_subtotal%7Cstring_format:%22%2510s%22%7D+%7B%24ts_taxRate%7D+%7B%24ts_taxAmount%7Cstring_format:%22%2510s%22%7D+%7B/if%7D+%7B%24ts_total%7Cstring_format:%22%2510s%22%7D%0A----------------------------------------------------------%0A%7Bforeach+from%3D%24value+item%3Dline%7D%0A%7Bcapture+assign%3Dts_item%7D%7Bif+%24line.html_type+eq+%27Text%27%7D%7B%24line.label%7D%7Belse%7D%7B%24line.field_title%7D+-+%7B%24line.label%7D%7B/if%7D+%7Bif+%24line.description%7D+%7B%24line.description%7D%7B/if%7D%7B/capture%7D%7B%24ts_item%7Ctruncate:30:%22...%22%7Cstring_format:%22%25-30s%22%7D+%7B%24line.qty%7Cstring_format:%22%255s%22%7D+%7B%24line.unit_price%7CcrmMoney:%24currency%7Cstring_format:%22%2510s%22%7D+%7Bif+%24dataArray%7D%7B%24line.unit_price%2A%24line.qty%7CcrmMoney:%24currency%7Cstring_format:%22%2510s%22%7D+%7Bif+%24line.tax_rate+%21%3D+%22%22+%7C%7C+%24line.tax_amount+%21%3D+%22%22%7D++%7B%24line.tax_rate%7Cstring_format:%22%25.2f%22%7D+%25++%7B%24line.tax_amount%7CcrmMoney:%24currency%7Cstring_format:%22%2510s%22%7D+%7Belse%7D++++++++++++++++++%7B/if%7D++%7B/if%7D+%7B%24line.line_total%2B%24line.tax_amount%7CcrmMoney:%24currency%7Cstring_format:%22%2510s%22%7D%0A%7B/foreach%7D%0A%7B/foreach%7D%0A%0A%7Bif+%24dataArray%7D%0A%7Bts%7DAmount+before+Tax%7B/ts%7D:+%7B%24amount-%24totalTaxAmount%7CcrmMoney:%24currency%7D%0A%0A%7Bforeach+from%3D%24dataArray+item%3Dvalue+key%3Dpriceset%7D%0A%7Bif+%24priceset+%7C%7C+%24priceset+%3D%3D+0%7D%0A%7B%24taxTerm%7D+%7B%24priceset%7Cstring_format:%22%25.2f%22%7D%25:+%7B%24value%7CcrmMoney:%24currency%7D%0A%7Belse%7D%0A%7Bts%7DNo%7B/ts%7D+%7B%24taxTerm%7D:+%7B%24value%7CcrmMoney:%24currency%7D%0A%7B/if%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%0A%7Bif+%24totalTaxAmount%7D%0A%7Bts%7DTotal+Tax+Amount%7B/ts%7D:+%7B%24totalTaxAmount%7CcrmMoney:%24currency%7D%0A%7B/if%7D%0A%0A%7Bts%7DTotal+Amount%7B/ts%7D:+%7B%24amount%7CcrmMoney:%24currency%7D%0A%7Belse%7D%0A%7Bts%7DAmount%7B/ts%7D:+%7B%24amount%7CcrmMoney:%24currency%7D+%7Bif+%24amount_level+%7D+-+%7B%24amount_level%7D+%7B/if%7D%0A%7B/if%7D%0A%7B/if%7D%0A%7Bif+%24receive_date%7D%0A%0A%7Bts%7DDate%7B/ts%7D:+%7B%24receive_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24is_monetary+and+%24trxn_id%7D%0A%7Bts%7DTransaction+%23%7B/ts%7D:+%7B%24trxn_id%7D%0A%7B/if%7D%0A%0A%7Bif+%24is_recur+and+%28%24contributeMode+eq+%27notify%27+or+%24contributeMode+eq+%27directIPN%27%29%7D%0A%7Bts%7DThis+is+a+recurring+contribution.+You+can+cancel+future+contributions+at:%7B/ts%7D%0A%0A%7B%24cancelSubscriptionUrl%7D%0A%0A%7Bif+%24updateSubscriptionBillingUrl%7D%0A%7Bts%7DYou+can+update+billing+details+for+this+recurring+contribution+at:%7B/ts%7D%0A%0A%7B%24updateSubscriptionBillingUrl%7D%0A%0A%7B/if%7D%0A%7Bts%7DYou+can+update+recurring+contribution+amount+or+change+the+number+of+installments+for+this+recurring+contribution+at:%7B/ts%7D%0A%0A%7B%24updateSubscriptionUrl%7D%0A%0A%7B/if%7D%0A%0A%7Bif+%24honor_block_is_active%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24soft_credit_type%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24honoreeProfile+item%3Dvalue+key%3Dlabel%7D%0A%7B%24label%7D:+%7B%24value%7D%0A%7B/foreach%7D%0A%7Belseif+%24softCreditTypes+and+%24softCredits%7D%0A%7Bforeach+from%3D%24softCreditTypes+item%3DsoftCreditType+key%3Dn%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24softCreditType%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24softCredits.%24n+item%3Dvalue+key%3Dlabel%7D%0A%7B%24label%7D:+%7B%24value%7D%0A%7B/foreach%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%7Bif+%24pcpBlock%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DPersonal+Campaign+Page%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DDisplay+In+Honor+Roll%7B/ts%7D:+%7Bif+%24pcp_display_in_roll%7D%7Bts%7DYes%7B/ts%7D%7Belse%7D%7Bts%7DNo%7B/ts%7D%7B/if%7D%0A%0A%7Bif+%24pcp_roll_nickname%7D%7Bts%7DNickname%7B/ts%7D:+%7B%24pcp_roll_nickname%7D%7B/if%7D%0A%0A%7Bif+%24pcp_personal_note%7D%7Bts%7DPersonal+Note%7B/ts%7D:+%7B%24pcp_personal_note%7D%7B/if%7D%0A%0A%7B/if%7D%0A%7Bif+%24onBehalfProfile%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DOn+Behalf+Of%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24onBehalfProfile+item%3DonBehalfValue+key%3DonBehalfName%7D%0A%7B%24onBehalfName%7D:+%7B%24onBehalfValue%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%0A%7Bif+%21%28+%24contributeMode+eq+%27notify%27+OR+%24contributeMode+eq+%27directIPN%27+%29+and+%24is_monetary%7D%0A%7Bif+%24is_pay_later+%26%26+%21%24isBillingAddressRequiredForPayLater%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DRegistered+Email%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24email%7D%0A%7Belseif+%24amount+GT+0%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DBilling+Name+and+Address%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24billingName%7D%0A%7B%24address%7D%0A%0A%7B%24email%7D%0A%7B/if%7D+%7B%2A+End+%21+is_pay_later+condition.+%2A%7D%0A%7B/if%7D%0A%7Bif+%24contributeMode+eq+%27direct%27+AND+%21%24is_pay_later+AND+%24amount+GT+0%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DCredit+Card+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24credit_card_type%7D%0A%7B%24credit_card_number%7D%0A%7Bts%7DExpires%7B/ts%7D:+%7B%24credit_card_exp_date%7Ctruncate:7:%27%27%7CcrmDate%7D%0A%7B/if%7D%0A%0A%7Bif+%24selectPremium+%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DPremium+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24product_name%7D%0A%7Bif+%24option%7D%0A%7Bts%7DOption%7B/ts%7D:+%7B%24option%7D%0A%7B/if%7D%0A%7Bif+%24sku%7D%0A%7Bts%7DSKU%7B/ts%7D:+%7B%24sku%7D%0A%7B/if%7D%0A%7Bif+%24start_date%7D%0A%7Bts%7DStart+Date%7B/ts%7D:+%7B%24start_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24end_date%7D%0A%7Bts%7DEnd+Date%7B/ts%7D:+%7B%24end_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24contact_email+OR+%24contact_phone%7D%0A%0A%7Bts%7DFor+information+about+this+premium%2C+contact:%7B/ts%7D%0A%0A%7Bif+%24contact_email%7D%0A++%7B%24contact_email%7D%0A%7B/if%7D%0A%7Bif+%24contact_phone%7D%0A++%7B%24contact_phone%7D%0A%7B/if%7D%0A%7B/if%7D%0A%7Bif+%24is_deductible+AND+%24price%7D%0A%0A%7Bts+1%3D%24price%7CcrmMoney:%24currency%7DThe+value+of+this+premium+is+%251.+This+may+affect+the+amount+of+the+tax+deduction+you+can+claim.+Consult+your+tax+advisor+for+more+information.%7B/ts%7D%7B/if%7D%0A%7B/if%7D%0A%0A%7Bif+%24customPre%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24customPre_grouptitle%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24customPre+item%3DcustomValue+key%3DcustomName%7D%0A%7Bif+%28+%24trackingFields+and+%21+in_array%28+%24customName%2C+%24trackingFields+%29+%29+or+%21+%24trackingFields%7D%0A+%7B%24customName%7D:+%7B%24customValue%7D%0A%7B/if%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%0A%0A%7Bif+%24customPost%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24customPost_grouptitle%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24customPost+item%3DcustomValue+key%3DcustomName%7D%0A%7Bif+%28+%24trackingFields+and+%21+in_array%28+%24customName%2C+%24trackingFields+%29+%29+or+%21+%24trackingFields%7D%0A+%7B%24customName%7D:+%7B%24customValue%7D%0A%7B/if%7D%0A%7B/foreach%7D%0A%7B/if%7D */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 1, false),array('block', 'ts', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 11, false),array('modifier', 'string_format', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 31, false),array('modifier', 'truncate', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 34, false),array('modifier', 'crmMoney', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 34, false),array('modifier', 'crmDate', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $amount}
===========================================================
{ts}Contribution Information{/ts}

===========================================================
{if $lineItem and $priceSetID and !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{if $dataArray}
{capture assign=ts_subtotal}{ts}Subtotal{/ts}{/capture}
{capture assign=ts_taxRate}{ts}Tax Rate{/ts}{/capture}
{capture assign=ts_taxAmount}{ts}Tax Amount{/ts}{/capture}
{/if}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {if $dataArray} {$ts_subtotal|string_format:"%10s"} {$ts_taxRate} {$ts_taxAmount|string_format:"%10s"} {/if} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney:$currency|string_format:"%10s"} {if $dataArray}{$line.unit_price*$line.qty|crmMoney:$currency|string_format:"%10s"} {if $line.tax_rate != "" || $line.tax_amount != ""}  {$line.tax_rate|string_format:"%.2f"} %  {$line.tax_amount|crmMoney:$currency|string_format:"%10s"} {else}                  {/if}  {/if} {$line.line_total+$line.tax_amount|crmMoney:$currency|string_format:"%10s"}
{/foreach}
{/foreach}

{if $dataArray}
{ts}Amount before Tax{/ts}: {$amount-$totalTaxAmount|crmMoney:$currency}

{foreach from=$dataArray item=value key=priceset}
{if $priceset || $priceset == 0}
{$taxTerm} {$priceset|string_format:"%.2f"}%: {$value|crmMoney:$currency}
{else}
{ts}No{/ts} {$taxTerm}: {$value|crmMoney:$currency}
{/if}
{/foreach}
{/if}

{if $totalTaxAmount}
{ts}Total Tax Amount{/ts}: {$totalTaxAmount|crmMoney:$currency}
{/if}

{ts}Total Amount{/ts}: {$amount|crmMoney:$currency}
{else}
{ts}Amount{/ts}: {$amount|crmMoney:$currency} {if $amount_level } - {$amount_level} {/if}
{/if}
{/if}
{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}
{/if}

{if $is_recur and ($contributeMode eq \'notify\' or $contributeMode eq \'directIPN\')}
{ts}This is a recurring contribution. You can cancel future contributions at:{/ts}

{$cancelSubscriptionUrl}

{if $updateSubscriptionBillingUrl}
{ts}You can update billing details for this recurring contribution at:{/ts}

{$updateSubscriptionBillingUrl}

{/if}
{ts}You can update recurring contribution amount or change the number of installments for this recurring contribution at:{/ts}

{$updateSubscriptionUrl}

{/if}

{if $honor_block_is_active}
===========================================================
{$soft_credit_type}
===========================================================
{foreach from=$honoreeProfile item=value key=label}
{$label}: {$value}
{/foreach}
{elseif $softCreditTypes and $softCredits}
{foreach from=$softCreditTypes item=softCreditType key=n}
===========================================================
{$softCreditType}
===========================================================
{foreach from=$softCredits.$n item=value key=label}
{$label}: {$value}
{/foreach}
{/foreach}
{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later && !$isBillingAddressRequiredForPayLater}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0}
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}', 61, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['receipt_text']): ?>
<?php echo $this->_tpl_vars['receipt_text']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['is_pay_later']): ?>

===========================================================
<?php echo $this->_tpl_vars['pay_later_receipt']; ?>

===========================================================
<?php else: ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please print this receipt for your records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['amount']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php if ($this->_tpl_vars['lineItem'] && $this->_tpl_vars['priceSetID'] && ! $this->_tpl_vars['is_quick_config']): ?>
<?php $_from = $this->_tpl_vars['lineItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
---------------------------------------------------------
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Item<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_item', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Qty<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_qty', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Each<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_each', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['dataArray']): ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Subtotal<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_subtotal', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax Rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_taxRate', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_taxAmount', ob_get_contents());ob_end_clean(); ?>
<?php endif; ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_total', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['ts_item'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_qty'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%5s") : smarty_modifier_string_format($_tmp, "%5s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_each'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php if ($this->_tpl_vars['dataArray']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_subtotal'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php echo $this->_tpl_vars['ts_taxRate']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_taxAmount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php endif; ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_total'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>

----------------------------------------------------------
<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line']):
?>
<?php ob_start(); ?><?php if ($this->_tpl_vars['line']['html_type'] == 'Text'): ?><?php echo $this->_tpl_vars['line']['label']; ?>
<?php else: ?><?php echo $this->_tpl_vars['line']['field_title']; ?>
 - <?php echo $this->_tpl_vars['line']['label']; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['line']['description']): ?> <?php echo $this->_tpl_vars['line']['description']; ?>
<?php endif; ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_item', ob_get_contents());ob_end_clean(); ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ts_item'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['qty'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%5s") : smarty_modifier_string_format($_tmp, "%5s")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['unit_price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php if ($this->_tpl_vars['dataArray']): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['unit_price']*$this->_tpl_vars['line']['qty'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php if ($this->_tpl_vars['line']['tax_rate'] != "" || $this->_tpl_vars['line']['tax_amount'] != ""): ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['tax_rate'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 %  <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['tax_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php else: ?>                  <?php endif; ?>  <?php endif; ?> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['line_total']+$this->_tpl_vars['line']['tax_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>

<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['dataArray']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Amount before Tax<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount']-$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>


<?php $_from = $this->_tpl_vars['dataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
<?php if ($this->_tpl_vars['priceset'] || $this->_tpl_vars['priceset'] == 0): ?>
<?php echo $this->_tpl_vars['taxTerm']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['priceset'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
%: <?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

<?php else: ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['taxTerm']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['totalTaxAmount']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Tax Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

<?php endif; ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

<?php else: ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>
 <?php if ($this->_tpl_vars['amount_level']): ?> - <?php echo $this->_tpl_vars['amount_level']; ?>
 <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['receive_date']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['receive_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['is_monetary'] && $this->_tpl_vars['trxn_id']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['trxn_id']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['is_recur'] && ( $this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN' )): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is a recurring contribution. You can cancel future contributions at:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php echo $this->_tpl_vars['cancelSubscriptionUrl']; ?>


<?php if ($this->_tpl_vars['updateSubscriptionBillingUrl']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can update billing details for this recurring contribution at:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php echo $this->_tpl_vars['updateSubscriptionBillingUrl']; ?>


<?php endif; ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can update recurring contribution amount or change the number of installments for this recurring contribution at:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php echo $this->_tpl_vars['updateSubscriptionUrl']; ?>


<?php endif; ?>

<?php if ($this->_tpl_vars['honor_block_is_active']): ?>
===========================================================
<?php echo $this->_tpl_vars['soft_credit_type']; ?>

===========================================================
<?php $_from = $this->_tpl_vars['honoreeProfile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['value']):
?>
<?php echo $this->_tpl_vars['label']; ?>
: <?php echo $this->_tpl_vars['value']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php elseif ($this->_tpl_vars['softCreditTypes'] && $this->_tpl_vars['softCredits']): ?>
<?php $_from = $this->_tpl_vars['softCreditTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['softCreditType']):
?>
===========================================================
<?php echo $this->_tpl_vars['softCreditType']; ?>

===========================================================
<?php $_from = $this->_tpl_vars['softCredits'][$this->_tpl_vars['n']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['value']):
?>
<?php echo $this->_tpl_vars['label']; ?>
: <?php echo $this->_tpl_vars['value']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['pcpBlock']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Campaign Page<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Display In Honor Roll<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php if ($this->_tpl_vars['pcp_display_in_roll']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Yes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>

<?php if ($this->_tpl_vars['pcp_roll_nickname']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Nickname<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['pcp_roll_nickname']; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['pcp_personal_note']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Note<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['pcp_personal_note']; ?>
<?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['onBehalfProfile']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>On Behalf Of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $_from = $this->_tpl_vars['onBehalfProfile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onBehalfName'] => $this->_tpl_vars['onBehalfValue']):
?>
<?php echo $this->_tpl_vars['onBehalfName']; ?>
: <?php echo $this->_tpl_vars['onBehalfValue']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! ( $this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN' ) && $this->_tpl_vars['is_monetary']): ?>
<?php if ($this->_tpl_vars['is_pay_later'] && ! $this->_tpl_vars['isBillingAddressRequiredForPayLater']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registered Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['email']; ?>

<?php elseif ($this->_tpl_vars['amount'] > 0): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['billingName']; ?>

<?php echo $this->_tpl_vars['address']; ?>


<?php echo $this->_tpl_vars['email']; ?>

<?php endif; ?> <?php endif; ?>
<?php if ($this->_tpl_vars['contributeMode'] == 'direct' && ! $this->_tpl_vars['is_pay_later'] && $this->_tpl_vars['amount'] > 0): ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['credit_card_type']; ?>

<?php echo $this->_tpl_vars['credit_card_number']; ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Expires<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['credit_card_exp_date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, '') : smarty_modifier_truncate($_tmp, 7, '')))) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['selectPremium']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Premium Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['product_name']; ?>

<?php if ($this->_tpl_vars['option']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Option<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['option']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['sku']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SKU<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['sku']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['start_date']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Start Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['end_date']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>End Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['contact_email'] || $this->_tpl_vars['contact_phone']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>For information about this premium, contact:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['contact_email']): ?>
  <?php echo $this->_tpl_vars['contact_email']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['contact_phone']): ?>
  <?php echo $this->_tpl_vars['contact_phone']; ?>

<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['is_deductible'] && $this->_tpl_vars['price']): ?>

<?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['customPre']): ?>
===========================================================
<?php echo $this->_tpl_vars['customPre_grouptitle']; ?>


===========================================================
<?php $_from = $this->_tpl_vars['customPre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
<?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
 <?php echo $this->_tpl_vars['customName']; ?>
: <?php echo $this->_tpl_vars['customValue']; ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['customPost']): ?>
===========================================================
<?php echo $this->_tpl_vars['customPost_grouptitle']; ?>


===========================================================
<?php $_from = $this->_tpl_vars['customPost']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
<?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
 <?php echo $this->_tpl_vars['customName']; ?>
: <?php echo $this->_tpl_vars['customValue']; ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>