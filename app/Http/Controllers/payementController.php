<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use App\Models\article;
use App\Models\commande;
use App\Models\quandite;
use DateTime;
use Session;
use App\Models\user;
use Illuminate\Support\Facades\Log;

class payementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('payements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $stripeSecretKey = 'sk_test_51PHWHe2KytYQAEthGspXCaZMuuLbN96Tr7K9V1ChJtcjYTa4DHeFOugWQ9ZySyMlWesjsBJ8yEyTN8CMxw2faQZS00Z6rCONHr';
        $stripe = new \Stripe\StripeClient($stripeSecretKey);
        
        $intent = $stripe->paymentIntents->create([
            'amount' => round(Cart::total()),
            'currency' => 'eur',
             ]);
            
            $clientSecret = Arr::get($intent, 'client_secret');
           
        return view('payements.create',[
            'clientSecret' => $clientSecret,
        
        ]);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Cart::destroy();
        $data = $request->json()->all();
    
        $commande = new commande();
        $commande->payment_intent_id = $data['paymentIntent']['id'];
        $commande->montant = $data['paymentIntent']['amount'];
        $commande->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;
        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $commande->articles = serialize($products);
        $commande->user_id = 1;
        $commande->save();
        $this->entreeArticle();

       
        if ($data['paymentIntent']['status'] === 'succeeded') {
            
           
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function thankyou()
    {
        return Session::has('success') ? view('paniers.merci') : redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    private function entreeArticle(){
        foreach (Cart::content() as $item) {
            $article = Article::find($item->id);
            if ($article) {
                quandite::create([
                    'articles_id' => $article->id, // Assurez-vous que 'articles_id' est une colonne dans votre table 'quantites'
                    'quandite' => $item->qty,
                    'etat' => 2, // Assurez-vous que 'quantite' est une colonne dans votre table 'quantites'
                    // 'etat' => 2, // Décommentez si vous avez besoin de cette colonne et que cela est logique pour votre application
                ]);
            } else {
                // Vous pouvez ajouter une gestion d'erreur ici si l'article n'est pas trouvé
                \Log::warning('Article non trouvé pour l\'ID: ' . $item->id);
            }
        }
    }
}
