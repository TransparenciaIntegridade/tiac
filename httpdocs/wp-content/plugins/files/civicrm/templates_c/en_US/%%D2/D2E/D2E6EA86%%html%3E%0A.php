<?php /* Smarty version 2.6.27, created on 2016-02-03 22:34:23
         compiled from string:%3C%21DOCTYPE+html+PUBLIC+%22-//W3C//DTD+XHTML+1.0+Transitional//EN%22+%22http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd%22%3E%0A%3Chtml+xmlns%3D%22http://www.w3.org/1999/xhtml%22%3E%0A%3Chead%3E%0A+%3Cmeta+http-equiv%3D%22Content-Type%22+content%3D%22text/html%3B+charset%3DUTF-8%22+/%3E%0A+%3Ctitle%3E%3C/title%3E%0A%3C/head%3E%0A%3Cbody%3E%0A%0A%7Bcapture+assign%3DheaderStyle%7Dcolspan%3D%222%22+style%3D%22text-align:+left%3B+padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23eee%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DlabelStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23f7f7f7%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DvalueStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B%22%7B/capture%7D%0A%0A%3Ccenter%3E%0A+%3Ctable+width%3D%22500%22+border%3D%220%22+cellpadding%3D%220%22+cellspacing%3D%220%22+id%3D%22crm-event_receipt%22+style%3D%22font-family:+Arial%2C+Verdana%2C+sans-serif%3B+text-align:+left%3B%22%3E%0A%0A++%3C%21--+BEGIN+HEADER+--%3E%0A++%3C%21--+You+can+add+table+row%28s%29+here+with+logo+or+other+header+elements+--%3E%0A++%3C%21--+END+HEADER+--%3E%0A%0A++%3C%21--+BEGIN+CONTENT+--%3E%0A%0A++%3Ctr%3E%0A+++%3Ctd%3E%0A%0A++++%7Bif+%24receipt_text%7D%0A+++++%3Cp%3E%7B%24receipt_text%7Chtmlize%7D%3C/p%3E%0A++++%7B/if%7D%0A%0A++++%7Bif+%24is_pay_later%7D%0A+++++%3Cp%3E%7B%24pay_later_receipt%7D%3C/p%3E+%7B%2A+FIXME:+this+might+be+text+rather+than+HTML+%2A%7D%0A++++%7Belse%7D%0A+++++%3Cp%3E%7Bts%7DPlease+print+this+confirmation+for+your+records.%7B/ts%7D%3C/p%3E%0A++++%7B/if%7D%0A%0A+++%3C/td%3E%0A++%3C/tr%3E%0A++%3C/table%3E%0A++%3Ctable+width%3D%22500%22+style%3D%22border:+1px+solid+%23999%3B+margin:+1em+0em+1em%3B+border-collapse:+collapse%3B%22%3E%0A%0A+++++%7Bif+%24amount%7D%0A%0A%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7Bts%7DContribution+Information%7B/ts%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A%0A++++++%7Bif+%24lineItem+and+%24priceSetID+and+%21%24is_quick_config%7D%0A%0A+++++++%7Bforeach+from%3D%24lineItem+item%3Dvalue+key%3Dpriceset%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++++%3Ctable%3E+%7B%2A+FIXME:+style+this+table+so+that+it+looks+like+the+text+version+%28justification%2C+etc.%29+%2A%7D%0A+++++++++++%3Ctr%3E%0A++++++++++++%3Cth%3E%7Bts%7DItem%7B/ts%7D%3C/th%3E%0A++++++++++++%3Cth%3E%7Bts%7DQty%7B/ts%7D%3C/th%3E%0A++++++++++++%3Cth%3E%7Bts%7DEach%7B/ts%7D%3C/th%3E%0A++++++++++++%7Bif+%24dataArray%7D%0A+++++++++++++%3Cth%3E%7Bts%7DSubtotal%7B/ts%7D%3C/th%3E%0A+++++++++++++%3Cth%3E%7Bts%7DTax+Rate%7B/ts%7D%3C/th%3E%0A+++++++++++++%3Cth%3E%7Bts%7DTax+Amount%7B/ts%7D%3C/th%3E%0A++++++++++++%7B/if%7D%0A++++++++++++%3Cth%3E%7Bts%7DTotal%7B/ts%7D%3C/th%3E%0A+++++++++++%3C/tr%3E%0A+++++++++++%7Bforeach+from%3D%24value+item%3Dline%7D%0A++++++++++++%3Ctr%3E%0A+++++++++++++%3Ctd%3E%0A+++++++++++++%7Bif+%24line.html_type+eq+%27Text%27%7D%7B%24line.label%7D%7Belse%7D%7B%24line.field_title%7D+-+%7B%24line.label%7D%7B/if%7D+%7Bif+%24line.description%7D%3Cdiv%3E%7B%24line.description%7Ctruncate:30:%22...%22%7D%3C/div%3E%7B/if%7D%0A+++++++++++++%3C/td%3E%0A+++++++++++++%3Ctd%3E%0A++++++++++++++%7B%24line.qty%7D%0A+++++++++++++%3C/td%3E%0A+++++++++++++%3Ctd%3E%0A++++++++++++++%7B%24line.unit_price%7CcrmMoney:%24currency%7D%0A+++++++++++++%3C/td%3E%0A+++++++++++++%7Bif+%24getTaxDetails%7D%0A++++++++++++++%3Ctd%3E%0A+++++++++++++++%7B%24line.unit_price%2A%24line.qty%7CcrmMoney:%24currency%7D%0A++++++++++++++%3C/td%3E%0A++++++++++++++%7Bif+%24line.tax_rate+%21%3D+%22%22+%7C%7C+%24line.tax_amount+%21%3D+%22%22%7D%0A+++++++++++++++%3Ctd%3E%0A++++++++++++++++%7B%24line.tax_rate%7Cstring_format:%22%25.2f%22%7D%25%0A+++++++++++++++%3C/td%3E%0A+++++++++++++++%3Ctd%3E%0A++++++++++++++++%7B%24line.tax_amount%7CcrmMoney:%24currency%7D%0A+++++++++++++++%3C/td%3E%0A++++++++++++++%7Belse%7D%0A+++++++++++++++%3Ctd%3E%3C/td%3E%0A+++++++++++++++%3Ctd%3E%3C/td%3E%0A++++++++++++++%7B/if%7D%0A+++++++++++++%7B/if%7D%0A+++++++++++++%3Ctd%3E%0A++++++++++++++%7B%24line.line_total%2B%24line.tax_amount%7CcrmMoney:%24currency%7D%0A+++++++++++++%3C/td%3E%0A++++++++++++%3C/tr%3E%0A+++++++++++%7B/foreach%7D%0A++++++++++%3C/table%3E%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/foreach%7D%0A+++++++%7Bif+%24dataArray%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7Bts%7D+Amount+before+Tax+:+%7B/ts%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24amount-%24totalTaxAmount%7CcrmMoney:%24currency%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A%0A++++++++%7Bforeach+from%3D%24dataArray+item%3Dvalue+key%3Dpriceset%7D%0A+++++++++%3Ctr%3E%0A++++++++++%7Bif+%24priceset+%7C%7C+%24priceset+%3D%3D+0%7D%0A+++++++++++%3Ctd%3E%26nbsp%3B%7B%24taxTerm%7D+%7B%24priceset%7Cstring_format:%22%25.2f%22%7D%25%3C/td%3E%0A+++++++++++%3Ctd%3E%26nbsp%3B%7B%24value%7CcrmMoney:%24currency%7D%3C/td%3E%0A++++++++++%7Belse%7D%0A+++++++++++%3Ctd%3E%26nbsp%3B%7Bts%7DNo%7B/ts%7D+%7B%24taxTerm%7D%3C/td%3E%0A+++++++++++%3Ctd%3E%26nbsp%3B%7B%24value%7CcrmMoney:%24currency%7D%3C/td%3E%0A++++++++++%7B/if%7D%0A+++++++++%3C/tr%3E%0A++++++++%7B/foreach%7D%0A%0A+++++++%7B/if%7D%0A+++++++%7Bif+%24totalTaxAmount%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7Bts%7DTotal+Tax%7B/ts%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24totalTaxAmount%7CcrmMoney:%24currency%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DTotal+Amount%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24amount%7CcrmMoney:%24currency%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A%0A++++++%7Belse%7D%0A%0A++++++%7Bif+%24totalTaxAmount%7D%0A+++++++++%3Ctr%3E%0A+++++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++++++%7Bts%7DTotal+Tax+Amount%7B/ts%7D%0A+++++++++++%3C/td%3E%0A+++++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++++++%7B%24totalTaxAmount%7CcrmMoney:%24currency%7D%0A+++++++++++%3C/td%3E%0A+++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DAmount%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24amount%7CcrmMoney:%24currency%7D+%7Bif+%24amount_level%7D+-+%7B%24amount_level%7D%7B/if%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A%0A++++++%7B/if%7D%0A%0A+++++%7B/if%7D%0A%0A%0A+++++%7Bif+%24receive_date%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++%7Bts%7DDate%7B/ts%7D%0A+++++++%3C/td%3E%0A+++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++%7B%24receive_date%7CcrmDate%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24is_monetary+and+%24trxn_id%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++%7Bts%7DTransaction+%23%7B/ts%7D%0A+++++++%3C/td%3E%0A+++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++%7B%24trxn_id%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24is_recur%7D%0A++++++%7Bif+%24contributeMode+eq+%27notify%27+or+%24contributeMode+eq+%27directIPN%27%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd++colspan%3D%222%22+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts+1%3D%24cancelSubscriptionUrl%7DThis+is+a+recurring+contribution.+You+can+cancel+future+contributions+by+%3Ca+href%3D%22%251%22%3Evisiting+this+web+page%3C/a%3E.%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%7Bif+%24updateSubscriptionBillingUrl%7D%0A+++++++++%3C/tr%3E%0A+++++++++%3Ctr%3E%0A+++++++++%3Ctd+colspan%3D%222%22+%7B%24labelStyle%7D%3E%0A++++++++++%7Bts+1%3D%24updateSubscriptionBillingUrl%7DYou+can+update+billing+details+for+this+recurring+contribution+by+%3Ca+href%3D%22%251%22%3Evisiting+this+web+page%3C/a%3E.%7B/ts%7D%0A+++++++++%3C/td%3E%0A++++++++%7B/if%7D%0A+++++++%3C/tr%3E%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+colspan%3D%222%22+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts+1%3D%24updateSubscriptionUrl%7DYou+can+update+recurring+contribution+amount+or+change+the+number+of+installments+for+this+recurring+contribution+by+%3Ca+href%3D%22%251%22%3Evisiting+this+web+page%3C/a%3E.%7B/ts%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24honor_block_is_active%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7B%24soft_credit_type%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%7Bforeach+from%3D%24honoreeProfile+item%3Dvalue+key%3Dlabel%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7B%24label%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24value%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A++++++%7B/foreach%7D%0A++++++%7Belseif+%24softCreditTypes+and+%24softCredits%7D%0A++++++%7Bforeach+from%3D%24softCreditTypes+item%3DsoftCreditType+key%3Dn%7D%0A+++++++%3Ctr%3E%0A++++++++%3Cth+%7B%24headerStyle%7D%3E%0A+++++++++%7B%24softCreditType%7D%0A++++++++%3C/th%3E%0A+++++++%3C/tr%3E%0A+++++++%7Bforeach+from%3D%24softCredits.%24n+item%3Dvalue+key%3Dlabel%7D%0A+++++++++%3Ctr%3E%0A++++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++++%7B%24label%7D%0A++++++++++%3C/td%3E%0A++++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++++%7B%24value%7D%0A++++++++++%3C/td%3E%0A+++++++++%3C/tr%3E%0A++++++++%7B/foreach%7D%0A+++++++%7B/foreach%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24pcpBlock%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7Bts%7DPersonal+Campaign+Page%7B/ts%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%3Ctr%3E%0A+++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++%7Bts%7DDisplay+In+Honor+Roll%7B/ts%7D%0A+++++++%3C/td%3E%0A+++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++%7Bif+%24pcp_display_in_roll%7D%7Bts%7DYes%7B/ts%7D%7Belse%7D%7Bts%7DNo%7B/ts%7D%7B/if%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A++++++%7Bif+%24pcp_roll_nickname%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DNickname%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24pcp_roll_nickname%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24pcp_personal_note%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DPersonal+Note%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24pcp_personal_note%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24onBehalfProfile%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7B%24onBehalfProfile_grouptitle%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%7Bforeach+from%3D%24onBehalfProfile+item%3DonBehalfValue+key%3DonBehalfName%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7B%24onBehalfName%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24onBehalfValue%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A++++++%7B/foreach%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24isShare%7D%0A++++++%3Ctr%3E%0A++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++++++%7Bcapture+assign%3DcontributionUrl%7D%7BcrmURL+p%3D%27civicrm/contribute/transact%27+q%3D%22reset%3D1%26id%3D%60%24contributionPageId%60%22+a%3Dtrue+fe%3D1+h%3D1%7D%7B/capture%7D%0A++++++++++++%7Binclude+file%3D%22CRM/common/SocialNetwork.tpl%22+emailMode%3Dtrue+url%3D%24contributionUrl+title%3D%24title+pageURL%3D%24contributionUrl%7D%0A++++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%21+%28%24contributeMode+eq+%27notify%27+OR+%24contributeMode+eq+%27directIPN%27%29+and+%24is_monetary%7D%0A++++++%7Bif+%24is_pay_later+%26%26+%21%24isBillingAddressRequiredForPayLater%7D%0A+++++++%3Ctr%3E%0A++++++++%3Cth+%7B%24headerStyle%7D%3E%0A+++++++++%7Bts%7DRegistered+Email%7B/ts%7D%0A++++++++%3C/th%3E%0A+++++++%3C/tr%3E%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24email%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7Belseif+%24amount+GT+0%7D%0A+++++++%3Ctr%3E%0A++++++++%3Cth+%7B%24headerStyle%7D%3E%0A+++++++++%7Bts%7DBilling+Name+and+Address%7B/ts%7D%0A++++++++%3C/th%3E%0A+++++++%3C/tr%3E%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24billingName%7D%3Cbr+/%3E%0A+++++++++%7B%24address%7Cnl2br%7D%3Cbr+/%3E%0A+++++++++%7B%24email%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24contributeMode+eq+%27direct%27+AND+%21%24is_pay_later+AND+%24amount+GT+0%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7Bts%7DCredit+Card+Information%7B/ts%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%3Ctr%3E%0A+++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++%7B%24credit_card_type%7D%3Cbr+/%3E%0A++++++++%7B%24credit_card_number%7D%3Cbr+/%3E%0A++++++++%7Bts%7DExpires%7B/ts%7D:+%7B%24credit_card_exp_date%7Ctruncate:7:%27%27%7CcrmDate%7D%3Cbr+/%3E%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24selectPremium%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7Bts%7DPremium+Information%7B/ts%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%3Ctr%3E%0A+++++++%3Ctd+colspan%3D%222%22+%7B%24labelStyle%7D%3E%0A++++++++%7B%24product_name%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A++++++%7Bif+%24option%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DOption%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24option%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24sku%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DSKU%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24sku%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24start_date%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DStart+Date%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24start_date%7CcrmDate%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24end_date%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++++%7Bts%7DEnd+Date%7B/ts%7D%0A++++++++%3C/td%3E%0A++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++++%7B%24end_date%7CcrmDate%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24contact_email+OR+%24contact_phone%7D%0A+++++++%3Ctr%3E%0A++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A+++++++++%3Cp%3E%7Bts%7DFor+information+about+this+premium%2C+contact:%7B/ts%7D%3C/p%3E%0A+++++++++%7Bif+%24contact_email%7D%0A++++++++++%3Cp%3E%7B%24contact_email%7D%3C/p%3E%0A+++++++++%7B/if%7D%0A+++++++++%7Bif+%24contact_phone%7D%0A++++++++++%3Cp%3E%7B%24contact_phone%7D%3C/p%3E%0A+++++++++%7B/if%7D%0A++++++++%3C/td%3E%0A+++++++%3C/tr%3E%0A++++++%7B/if%7D%0A++++++%7Bif+%24is_deductible+AND+%24price%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+colspan%3D%222%22+%7B%24valueStyle%7D%3E%0A++++++++++%3Cp%3E%7Bts+1%3D%24price%7CcrmMoney:%24currency%7DThe+value+of+this+premium+is+%251.+This+may+affect+the+amount+of+the+tax+deduction+you+can+claim.+Consult+your+tax+advisor+for+more+information.%7B/ts%7D%3C/p%3E%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A++++++%7B/if%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24customPre%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7B%24customPre_grouptitle%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%7Bforeach+from%3D%24customPre+item%3DcustomValue+key%3DcustomName%7D%0A+++++++%7Bif+%28%24trackingFields+and+%21+in_array%28%24customName%2C+%24trackingFields%29%29+or+%21+%24trackingFields%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7B%24customName%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24customValue%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A++++++%7B/foreach%7D%0A+++++%7B/if%7D%0A%0A+++++%7Bif+%24customPost%7D%0A++++++%3Ctr%3E%0A+++++++%3Cth+%7B%24headerStyle%7D%3E%0A++++++++%7B%24customPost_grouptitle%7D%0A+++++++%3C/th%3E%0A++++++%3C/tr%3E%0A++++++%7Bforeach+from%3D%24customPost+item%3DcustomValue+key%3DcustomName%7D%0A+++++++%7Bif+%28%24trackingFields+and+%21+in_array%28%24customName%2C+%24trackingFields%29%29+or+%21+%24trackingFields%7D%0A++++++++%3Ctr%3E%0A+++++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++++%7B%24customName%7D%0A+++++++++%3C/td%3E%0A+++++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++++%7B%24customValue%7D%0A+++++++++%3C/td%3E%0A++++++++%3C/tr%3E%0A+++++++%7B/if%7D%0A++++++%7B/foreach%7D%0A+++++%7B/if%7D%0A%0A++%3C/table%3E%0A%3C/center%3E%0A%0A%3C/body%3E%0A%3C/html%3E%0A */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 1, false),array('block', 'ts', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 32, false),array('modifier', 'htmlize', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 26, false),array('modifier', 'truncate', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 69, false),array('modifier', 'crmMoney', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 75, false),array('modifier', 'string_format', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 83, false),array('modifier', 'crmDate', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 176, false),array('modifier', 'nl2br', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 334, false),array('function', 'crmURL', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    {if $receipt_text}
     <p>{$receipt_text|htmlize}</p>
    {/if}

    {if $is_pay_later}
     <p>{$pay_later_receipt}</p> {* FIXME: this might be text rather than HTML *}
    {else}
     <p>{ts}Please print this confirmation for your records.{/ts}</p>
    {/if}

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     {if $amount}


      <tr>
       <th {$headerStyle}>
        {ts}Contribution Information{/ts}
       </th>
      </tr>

      {if $lineItem and $priceSetID and !$is_quick_config}

       {foreach from=$lineItem item=value key=priceset}
        <tr>
         <td colspan="2" {$valueStyle}>
          <table> {* FIXME: style this table so that it looks like the text version (justification, etc.) *}
           <tr>
            <th>{ts}Item{/ts}</th>
            <th>{ts}Qty{/ts}</th>
            <th>{ts}Each{/ts}</th>
            {if $dataArray}
             <th>{ts}Subtotal{/ts}</th>
             <th>{ts}Tax Rate{/ts}</th>
             <th>{ts}Tax Amount{/ts}</th>
            {/if}
            <th>{ts}Total{/ts}</th>
           </tr>
           {foreach from=$value item=line}
            <tr>
             <td>
             {if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description}<div>{$line.description|truncate:30:"..."}</div>{/if}
             </td>
             <td>
              {$line.qty}
             </td>
             <td>
              {$line.unit_price|crmMoney:$currency}
             </td>
             {if $getTaxDetails}
              <td>
               {$line.unit_price*$line.qty|crmMoney:$currency}
              </td>
              {if $line.tax_rate != "" || $line.tax_amount != ""}
               <td>
                {$line.tax_rate|string_format:"%.2f"}%
               </td>
               <td>
                {$line.tax_amount|crmMoney:$currency}
               </td>
              {else}
               <td></td>
               <td></td>
              {/if}
             {/if}
             <td>
              {$line.line_total+$line.tax_amount|crmMoney:$currency}
             </td>
            </tr>
           {/foreach}
          </table>
         </td>
        </tr>
       {/foreach}
       {if $dataArray}
        <tr>
         <td {$labelStyle}>
          {ts} Amount before Tax : {/ts}
         </td>
         <td {$valueStyle}>
          {$amount-$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>

        {foreach from=$dataArray item=value key=priceset}
         <tr>
          {if $priceset || $priceset == 0}
           <td>&nbsp;{$taxTerm} {$priceset|string_format:"%.2f"}%</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {else}
           <td>&nbsp;{ts}No{/ts} {$taxTerm}</td>
           <td>&nbsp;{$value|crmMoney:$currency}</td>
          {/if}
         </tr>
        {/foreach}

       {/if}
       {if $totalTaxAmount}
        <tr>
         <td {$labelStyle}>
          {ts}Total Tax{/ts}
         </td>
         <td {$valueStyle}>
          {$totalTaxAmount|crmMoney:$currency}
         </td>
        </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Total Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency}
        </td>
       </tr>

      {else}

      {if $totalTaxAmount}
         <tr>
           <td {$labelStyle}>
             {ts}Total Tax Amount{/ts}
           </td>
           <td {$valueStyle}>
             {$totalTaxAmount|crmMoney:$currency}
           </td>
         </tr>
       {/if}
       <tr>
        <td {$labelStyle}>
         {ts}Amount{/ts}
        </td>
        <td {$valueStyle}>
         {$amount|crmMoney:$currency} {if $amount_level} - {$amount_level}{/if}
        </td>
       </tr>

      {/if}

     {/if}


     {if $receive_date}
      <tr>
       <td {$labelStyle}>
        {ts}Date{/ts}
       </td>
       <td {$valueStyle}>
        {$receive_date|crmDate}
       </td>
      </tr>
     {/if}

     {if $is_monetary and $trxn_id}
      <tr>
       <td {$labelStyle}>
        {ts}Transaction #{/ts}
       </td>
       <td {$valueStyle}>
        {$trxn_id}
       </td>
      </tr>
     {/if}

     {if $is_recur}
      {if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
       <tr>
        <td  colspan="2" {$labelStyle}>
         {ts 1=$cancelSubscriptionUrl}This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.{/ts}
        </td>
        {if $updateSubscriptionBillingUrl}
         </tr>
         <tr>
         <td colspan="2" {$labelStyle}>
          {ts 1=$updateSubscriptionBillingUrl}You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
         </td>
        {/if}
       </tr>
       <tr>
        <td colspan="2" {$labelStyle}>
         {ts 1=$updateSubscriptionUrl}You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.{/ts}
        </td>
       </tr>
      {/if}
     {/if}

     {if $honor_block_is_active}
      <tr>
       <th {$headerStyle}>
        {$soft_credit_type}
       </th>
      </tr>
      {foreach from=$honoreeProfile item=value key=label}
        <tr>
         <td {$labelStyle}>
          {$label}
         </td>
         <td {$valueStyle}>
          {$value}
         </td>
        </tr>
      {/foreach}
      {elseif $softCreditTypes and $softCredits}
      {foreach from=$softCreditTypes item=softCreditType key=n}
       <tr>
        <th {$headerStyle}>
         {$softCreditType}
        </th>
       </tr>
       {foreach from=$softCredits.$n item=value key=label}
         <tr>
          <td {$labelStyle}>
           {$label}
          </td>
          <td {$valueStyle}>
           {$value}
          </td>
         </tr>
        {/foreach}
       {/foreach}
     {/if}

     {if $pcpBlock}
      <tr>
       <th {$headerStyle}>
        {ts}Personal Campaign Page{/ts}
       </th>
      </tr>
      <tr>
       <td {$labelStyle}>
        {ts}Display In Honor Roll{/ts}
       </td>
       <td {$valueStyle}>
        {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}
       </td>
      </tr>
      {if $pcp_roll_nickname}
       <tr>
        <td {$labelStyle}>
         {ts}Nickname{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_roll_nickname}
        </td>
       </tr>
      {/if}
      {if $pcp_personal_note}
       <tr>
        <td {$labelStyle}>
         {ts}Personal Note{/ts}
        </td>
        <td {$valueStyle}>
         {$pcp_personal_note}
        </td>
       </tr>
      {/if}
     {/if}

     {if $onBehalfProfile}
      <tr>
       <th {$headerStyle}>
        {$onBehalfProfile_grouptitle}
       </th>
      </tr>
      {foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
        <tr>
         <td {$labelStyle}>
          {$onBehalfName}
         </td>
         <td {$valueStyle}>
          {$onBehalfValue}
         </td>
        </tr>
      {/foreach}
     {/if}

     {if $isShare}
      <tr>
        <td colspan="2" {$valueStyle}>
            {capture assign=contributionUrl}{crmURL p=\'civicrm/contribute/transact\' q="reset=1&id=`$contributionPageId`" a=true fe=1 h=1}{/capture}
            {include file="CRM/common/SocialNetwork.tpl" emailMode=true url=$contributionUrl title=$title pageURL=$contributionUrl}
        </td>
      </tr>
     {/if}

     {if ! ($contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\') and $is_monetary}
      {if $is_pay_later && !$isBillingAddressRequiredForPayLater}
       <tr>
        <th {$headerStyle}>
         {ts}Registered Email{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$email}
        </td>
       </tr>
      {elseif $amount GT 0}
       <tr>
        <th {$headerStyle}>
         {ts}Billing Name and Address{/ts}
        </th>
       </tr>
       <tr>
        <td colspan="2" {$valueStyle}>
         {$billingName}<br />
         {$address|nl2br}<br />
         {$email}
        </td>
       </tr>
      {/if}
     {/if}

     {if $contributeMode eq \'direct\' AND !$is_pay_later AND $amount GT 0}
      <tr>
       <th {$headerStyle}>
        {ts}Credit Card Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$valueStyle}>
        {$credit_card_type}<br />
        {$credit_card_number}<br />
        {ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}<br />
       </td>
      </tr>
     {/if}

     {if $selectPremium}
      <tr>
       <th {$headerStyle}>
        {ts}Premium Information{/ts}
       </th>
      </tr>
      <tr>
       <td colspan="2" {$labelStyle}>
        {$product_name}
       </td>
      </tr>
      {if $option}
       <tr>
        <td {$labelStyle}>
         {ts}Option{/ts}
        </td>
        <td {$valueStyle}>
         {$option}
        </td>
       </tr>
      {/if}
      {if $sku}
       <tr>
        <td {$labelStyle}>
         {ts}SKU{/ts}
        </td>
        <td {$valueStyle}>
         {$sku}
        </td>
       </tr>
      {/if}
      {if $start_date}
       <tr>
        <td {$labelStyle}>
         {ts}Start Date{/ts}
        </td>
        <td {$valueStyle}>
         {$start_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $end_date}
       <tr>
        <td {$labelStyle}>
         {ts}End Date{/ts}
        </td>
        <td {$valueStyle}>
         {$end_date|crmDate}
        </td>
       </tr>
      {/if}
      {if $contact_email OR $contact_phone}
       <tr>
        <td colspan="2" {$valueStyle}>
         <p>{ts}For information about this premium, contact:{/ts}</p>
         {if $contact_email}
          <p>{$contact_email}</p>
         {/if}
         {if $contact_phone}
          <p>{$contact_phone}</p>
         {/if}
        </td>
       </tr>
      {/if}
      {if $is_deductible AND $price}
        <tr>
         <td colspan="2" {$valueStyle}>
          <p>{ts 1=$price|crmMoney:$currency}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}</p>
         </td>
        </tr>
      {/if}
     {/if}

     {if $customPre}
      <tr>
       <th {$headerStyle}>
        {$customPre_grouptitle}
       </th>
      </tr>
      {foreach from=$customPre item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

     {if $customPost}
      <tr>
       <th {$headerStyle}>
        {$customPost_grouptitle}
       </th>
      </tr>
      {foreach from=$customPost item=customValue key=customName}
       {if ($trackingFields and ! in_array($customName, $trackingFields)) or ! $trackingFields}
        <tr>
         <td {$labelStyle}>
          {$customName}
         </td>
         <td {$valueStyle}>
          {$customValue}
         </td>
        </tr>
       {/if}
      {/foreach}
     {/if}

  </table>
</center>

</body>
</html>
', 307, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

<?php ob_start(); ?>colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('headerStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('labelStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('valueStyle', ob_get_contents());ob_end_clean(); ?>

<center>
 <table width="500" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>

    <?php if ($this->_tpl_vars['receipt_text']): ?>
     <p><?php echo ((is_array($_tmp=$this->_tpl_vars['receipt_text'])) ? $this->_run_mod_handler('htmlize', true, $_tmp) : smarty_modifier_htmlize($_tmp)); ?>
</p>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['is_pay_later']): ?>
     <p><?php echo $this->_tpl_vars['pay_later_receipt']; ?>
</p>     <?php else: ?>
     <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please print this confirmation for your records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
    <?php endif; ?>

   </td>
  </tr>
  </table>
  <table width="500" style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse;">

     <?php if ($this->_tpl_vars['amount']): ?>


      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </th>
      </tr>

      <?php if ($this->_tpl_vars['lineItem'] && $this->_tpl_vars['priceSetID'] && ! $this->_tpl_vars['is_quick_config']): ?>

       <?php $_from = $this->_tpl_vars['lineItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
        <tr>
         <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <table>            <tr>
            <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Item<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
            <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Qty<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
            <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Each<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
            <?php if ($this->_tpl_vars['dataArray']): ?>
             <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Subtotal<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
             <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax Rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
             <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
            <?php endif; ?>
            <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
           </tr>
           <?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line']):
?>
            <tr>
             <td>
             <?php if ($this->_tpl_vars['line']['html_type'] == 'Text'): ?><?php echo $this->_tpl_vars['line']['label']; ?>
<?php else: ?><?php echo $this->_tpl_vars['line']['field_title']; ?>
 - <?php echo $this->_tpl_vars['line']['label']; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['line']['description']): ?><div><?php echo ((is_array($_tmp=$this->_tpl_vars['line']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")); ?>
</div><?php endif; ?>
             </td>
             <td>
              <?php echo $this->_tpl_vars['line']['qty']; ?>

             </td>
             <td>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['unit_price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

             </td>
             <?php if ($this->_tpl_vars['getTaxDetails']): ?>
              <td>
               <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['unit_price']*$this->_tpl_vars['line']['qty'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

              </td>
              <?php if ($this->_tpl_vars['line']['tax_rate'] != "" || $this->_tpl_vars['line']['tax_amount'] != ""): ?>
               <td>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['tax_rate'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
%
               </td>
               <td>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['tax_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

               </td>
              <?php else: ?>
               <td></td>
               <td></td>
              <?php endif; ?>
             <?php endif; ?>
             <td>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['line_total']+$this->_tpl_vars['line']['tax_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

             </td>
            </tr>
           <?php endforeach; endif; unset($_from); ?>
          </table>
         </td>
        </tr>
       <?php endforeach; endif; unset($_from); ?>
       <?php if ($this->_tpl_vars['dataArray']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?> Amount before Tax : <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo ((is_array($_tmp=$this->_tpl_vars['amount']-$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

         </td>
        </tr>

        <?php $_from = $this->_tpl_vars['dataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
         <tr>
          <?php if ($this->_tpl_vars['priceset'] || $this->_tpl_vars['priceset'] == 0): ?>
           <td>&nbsp;<?php echo $this->_tpl_vars['taxTerm']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['priceset'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
%</td>
           <td>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>
</td>
          <?php else: ?>
           <td>&nbsp;<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['taxTerm']; ?>
</td>
           <td>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>
</td>
          <?php endif; ?>
         </tr>
        <?php endforeach; endif; unset($_from); ?>

       <?php endif; ?>
       <?php if ($this->_tpl_vars['totalTaxAmount']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Tax<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo ((is_array($_tmp=$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

         </td>
        </tr>
       <?php endif; ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

        </td>
       </tr>

      <?php else: ?>

      <?php if ($this->_tpl_vars['totalTaxAmount']): ?>
         <tr>
           <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
             <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Tax Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
           </td>
           <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
             <?php echo ((is_array($_tmp=$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>

           </td>
         </tr>
       <?php endif; ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])); ?>
 <?php if ($this->_tpl_vars['amount_level']): ?> - <?php echo $this->_tpl_vars['amount_level']; ?>
<?php endif; ?>
        </td>
       </tr>

      <?php endif; ?>

     <?php endif; ?>


     <?php if ($this->_tpl_vars['receive_date']): ?>
      <tr>
       <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </td>
       <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['receive_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

       </td>
      </tr>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['is_monetary'] && $this->_tpl_vars['trxn_id']): ?>
      <tr>
       <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </td>
       <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo $this->_tpl_vars['trxn_id']; ?>

       </td>
      </tr>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['is_recur']): ?>
      <?php if ($this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN'): ?>
       <tr>
        <td  colspan="2" <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['cancelSubscriptionUrl'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is a recurring contribution. You can cancel future contributions by <a href="%1">visiting this web page</a>.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <?php if ($this->_tpl_vars['updateSubscriptionBillingUrl']): ?>
         </tr>
         <tr>
         <td colspan="2" <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['updateSubscriptionBillingUrl'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can update billing details for this recurring contribution by <a href="%1">visiting this web page</a>.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </td>
        <?php endif; ?>
       </tr>
       <tr>
        <td colspan="2" <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['updateSubscriptionUrl'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can update recurring contribution amount or change the number of installments for this recurring contribution by <a href="%1">visiting this web page</a>.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
       </tr>
      <?php endif; ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['honor_block_is_active']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php echo $this->_tpl_vars['soft_credit_type']; ?>

       </th>
      </tr>
      <?php $_from = $this->_tpl_vars['honoreeProfile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['value']):
?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php echo $this->_tpl_vars['label']; ?>

         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['value']; ?>

         </td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
      <?php elseif ($this->_tpl_vars['softCreditTypes'] && $this->_tpl_vars['softCredits']): ?>
      <?php $_from = $this->_tpl_vars['softCreditTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['softCreditType']):
?>
       <tr>
        <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
         <?php echo $this->_tpl_vars['softCreditType']; ?>

        </th>
       </tr>
       <?php $_from = $this->_tpl_vars['softCredits'][$this->_tpl_vars['n']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['value']):
?>
         <tr>
          <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
           <?php echo $this->_tpl_vars['label']; ?>

          </td>
          <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
           <?php echo $this->_tpl_vars['value']; ?>

          </td>
         </tr>
        <?php endforeach; endif; unset($_from); ?>
       <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['pcpBlock']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Campaign Page<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </th>
      </tr>
      <tr>
       <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Display In Honor Roll<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </td>
       <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php if ($this->_tpl_vars['pcp_display_in_roll']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Yes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
       </td>
      </tr>
      <?php if ($this->_tpl_vars['pcp_roll_nickname']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Nickname<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['pcp_roll_nickname']; ?>

        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['pcp_personal_note']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Note<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['pcp_personal_note']; ?>

        </td>
       </tr>
      <?php endif; ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['onBehalfProfile']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php echo $this->_tpl_vars['onBehalfProfile_grouptitle']; ?>

       </th>
      </tr>
      <?php $_from = $this->_tpl_vars['onBehalfProfile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onBehalfName'] => $this->_tpl_vars['onBehalfValue']):
?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php echo $this->_tpl_vars['onBehalfName']; ?>

         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['onBehalfValue']; ?>

         </td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['isShare']): ?>
      <tr>
        <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
            <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/transact','q' => "reset=1&id=".($this->_tpl_vars['contributionPageId']),'a' => true,'fe' => 1,'h' => 1), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('contributionUrl', ob_get_contents());ob_end_clean(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/SocialNetwork.tpl", 'smarty_include_vars' => array('emailMode' => true,'url' => $this->_tpl_vars['contributionUrl'],'title' => $this->_tpl_vars['title'],'pageURL' => $this->_tpl_vars['contributionUrl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
      </tr>
     <?php endif; ?>

     <?php if (! ( $this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN' ) && $this->_tpl_vars['is_monetary']): ?>
      <?php if ($this->_tpl_vars['is_pay_later'] && ! $this->_tpl_vars['isBillingAddressRequiredForPayLater']): ?>
       <tr>
        <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registered Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </th>
       </tr>
       <tr>
        <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['email']; ?>

        </td>
       </tr>
      <?php elseif ($this->_tpl_vars['amount'] > 0): ?>
       <tr>
        <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </th>
       </tr>
       <tr>
        <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['billingName']; ?>
<br />
         <?php echo ((is_array($_tmp=$this->_tpl_vars['address'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br />
         <?php echo $this->_tpl_vars['email']; ?>

        </td>
       </tr>
      <?php endif; ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['contributeMode'] == 'direct' && ! $this->_tpl_vars['is_pay_later'] && $this->_tpl_vars['amount'] > 0): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </th>
      </tr>
      <tr>
       <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo $this->_tpl_vars['credit_card_type']; ?>
<br />
        <?php echo $this->_tpl_vars['credit_card_number']; ?>
<br />
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Expires<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['credit_card_exp_date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, '') : smarty_modifier_truncate($_tmp, 7, '')))) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<br />
       </td>
      </tr>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['selectPremium']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Premium Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </th>
      </tr>
      <tr>
       <td colspan="2" <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php echo $this->_tpl_vars['product_name']; ?>

       </td>
      </tr>
      <?php if ($this->_tpl_vars['option']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Option<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['option']; ?>

        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['sku']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SKU<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo $this->_tpl_vars['sku']; ?>

        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['start_date']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Start Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['end_date']): ?>
       <tr>
        <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
         <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>End Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </td>
        <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['contact_email'] || $this->_tpl_vars['contact_phone']): ?>
       <tr>
        <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
         <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>For information about this premium, contact:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
         <?php if ($this->_tpl_vars['contact_email']): ?>
          <p><?php echo $this->_tpl_vars['contact_email']; ?>
</p>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['contact_phone']): ?>
          <p><?php echo $this->_tpl_vars['contact_phone']; ?>
</p>
         <?php endif; ?>
        </td>
       </tr>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['is_deductible'] && $this->_tpl_vars['price']): ?>
        <tr>
         <td colspan="2" <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <p><?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp, $this->_tpl_vars['currency']) : smarty_modifier_crmMoney($_tmp, $this->_tpl_vars['currency'])))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
         </td>
        </tr>
      <?php endif; ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['customPre']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php echo $this->_tpl_vars['customPre_grouptitle']; ?>

       </th>
      </tr>
      <?php $_from = $this->_tpl_vars['customPre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
       <?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php echo $this->_tpl_vars['customName']; ?>

         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['customValue']; ?>

         </td>
        </tr>
       <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>

     <?php if ($this->_tpl_vars['customPost']): ?>
      <tr>
       <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
        <?php echo $this->_tpl_vars['customPost_grouptitle']; ?>

       </th>
      </tr>
      <?php $_from = $this->_tpl_vars['customPost']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
       <?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
        <tr>
         <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
          <?php echo $this->_tpl_vars['customName']; ?>

         </td>
         <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
          <?php echo $this->_tpl_vars['customValue']; ?>

         </td>
        </tr>
       <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>

  </table>
</center>

</body>
</html>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>