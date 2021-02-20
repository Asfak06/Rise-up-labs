<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
class QueryController extends Controller
{
	public function text_field($logic,$value,$field){
          if($logic=='contains'){
          	$logic='LIKE';
          	$value='%'.$value.'%';
          }elseif ($logic=='is') {
          	$logic='=';
          	$value=$value;
          }elseif ($logic=='is_not') {
          	$logic='!=';
          	$value=$value;
          }elseif ($logic=='starts_with') {
          	$logic='LIKE';
          	$value=$value.'%';
          }elseif ($logic=='ends_with') {
          	$logic='LIKE';
          	$value='%'.$value;
          }       
          $result=User::where($field,$logic,$value)->get();
          return $result;
    }

    public function date_field($logic,$value,$end_date){
          if($logic=='between'){
            $result=User::whereBetween('birth_day', [$value, $end_date])->get();
          }elseif ($logic=='before') {
            $result=User::where('birth_day', '<', $value)->get();
          }elseif ($logic=='on') {
          	$value=Carbon::parse($value)->format('Y-m-d');
          	$result=User::whereDate('birth_day', '=',$value)->get();
          }elseif ($logic=='after') {
            $result=User::where('birth_day', '>', $value)->get();
          }      
          return $result; 	
    }
    public function field($field,$name_logic,$name,$email_logic,$email,$date_logic,$date,$end_date){
    		if($field=='first_name'){
               if($name_logic!='Choose logic'){
                  $res=$this->text_field($name_logic,$name,$field);
                  return $res;
               }
    		}elseif ($field=='email') {
               if($name_logic!='Choose logic'){
                  $res=$this->text_field($email_logic,$email,$field); 
                  return $res;   
               }
    		}elseif ($field=='birth_day') {
                  $logic=$date_logic;
                  $value=$date;
                  if($end_date != ''){
                  	$end_date=$end_date;
                  }         
                  $res=$this->date_field($date_logic,$date,$end_date); 
                  return $res;
    		}
    }

    public function query(Request $request){

    	$field1 = array();
    	$field2 = array();
    	$field3 = array();
    	if($request->field1 != 'Choose field'){
            $field1=$this->field($request->field1,$request->name_logic1,$request->name1,$request->email_logic1,$request->email1,$request->date_logic1,$request->date1,$request->end_date1);
    	}

    	if($request->field2 != 'Choose field'){
  			$field2=$this->field($request->field2,$request->name_logic2,$request->name2,$request->email_logic2,$request->email2,$request->date_logic2,$request->date2,$request->end_date2);
    	}

    	if($request->field3 != 'Choose field'){
  			$field3=$this->field($request->field3,$request->name_logic3,$request->name3,$request->email_logic3,$request->email3,$request->date_logic3,$request->date3,$request->end_date3);
    	}

        if(isset($request->logic1) and !isset($request->logic2)){
          if($request->logic1 != 'Choose field'){
          	if(!empty($field1) and !empty($field2)){
          		if($request->logic1=='and'){
               $query = $field1->intersect($field2);
               return view('result')->with('users',$query);
          		}elseif ($request->logic1=='or') {
               $query = $field1->merge($field2);
               return view('result')->with('users',$query); 
              }
          	}elseif(!empty($field1) and !empty($field3)){
              if($request->logic1=='and'){
               $query = $field1->intersect($field3);
               return view('result')->with('users',$query);
              }elseif ($request->logic1=='or') {
               $query = $field1->merge($field3);
               return view('result')->with('users',$query); 
              }
            }else{
              echo "<h1>Add Field!</h1>";
            }
          }else{
            echo "<h1>choose logic</h1>";
          } 
        }

        if(isset($request->logic2) and !isset($request->logic1)){
          if($request->logic2 != 'Choose field'){
            if(!empty($field2) and !empty($field3)){
              if($request->logic2=='and'){
               $query = $field2->intersect($field3);
               return view('result')->with('users',$query); 
              }elseif ($request->logic2=='or') {
               $query = $field2->merge($field3);
               return view('result')->with('users',$query);
              }
            }elseif(!empty($field1) and !empty($field3)){
              if($request->logic2=='and'){
               $query = $field1->intersect($field3);
               return view('result')->with('users',$query);
              }elseif ($request->logic2=='or') {
               $query = $field1->merge($field3);
               return view('result')->with('users',$query);
              }               
            }
            else{
              echo "<h1>Add Field!</h1>";
            }
          }else{
            echo "<h1>choose logic</h1>";
          } 
        }

        if(isset($request->logic1) and isset($request->logic2)){
          if($request->logic1 != 'Choose field' and $request->logic2 != 'Choose field'){
            if(!empty($field1) and !empty($field2) and !empty($field3)){
               if($request->logic1=='and' and $request->logic2=='and'){
                 $query1 = $field1->intersect($field2);
                 $query = $query1->intersect($field3);
                 return view('result')->with('users',$query);
               }                         
              if($request->logic1=='or' and $request->logic2=='or'){
                 $query1 = $field1->merge($field2);
                 $query = $query1->merge($field3);
               return view('result')->with('users',$query); 
               }                
              if($request->logic1=='or' and $request->logic2=='and'){
                 $query1 = $field2->intersect($field3);
                 $query = $query1->merge($field1);
               return view('result')->with('users',$query);
               }   
              if($request->logic1=='and' and $request->logic2=='or'){
                 $query1 = $field1->intersect($field2);
                 $query = $query1->merge($field3);
               return view('result')->with('users',$query); 
               }              
            }else{
              echo "<h1>Add Field!</h1>";
            }    
          }else{
            echo "<h1>Choose logic</h1>";
          }
        }

        if(!isset($request->logic2) and !isset($request->logic1)){
            if(!empty($field1)){
              $query=$field1;
               return view('result')->with('users',$query); 
            }elseif (!empty($field2)) {
              $query=$field2;
                 return view('result')->with('users',$query); 
            }elseif (!empty($field3)) {
              $query=$field3;
               return view('result')->with('users',$query);
            }else{
              echo "<h1>Nothin found</h1>";
            }            
        }
    }


}
