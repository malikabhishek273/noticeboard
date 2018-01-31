// BY- ABHISHEK MALIK
#include<bits/stdc++.h>
#define ull unsigned long long
#define ll long long
#define pb push_back
#define F first
#define S second
#define mk make_pair
#define inf INT_MAX
#define mini INT_MIN
#define MOD 1000000007
#define all(v) (v).begin(),(v).end()
#define pii pair<int ,int >
#define pll pair<long long int ,long long int>
#define mset(v,x) memset(v,x,sizeof(v))
#define MODSET(d) if ((d) >= MOD) d %= MOD;
#define inp(x) (scanf("%d",&x))
#define inp2(x,y) (scanf("%d%d",&x,&y))
#define inp3(x,y,z) (scanf("%d%d%d",&x,&y,&z))
#define inp4(x,y,z,w) (scanf("%d%d%d%d",&x,&y,&z,&w))
#define inpl(d) scanf("%lld",&d)
#define inpl2(a,b) scanf("%lld%lld",&a,&b)
#define inpl3(a,b,c) scanf("%lld%lld%lld",&a,&b,&c)
#define inpl4(a,b,c,d) scanf("%lld%lld%lld%lld",&a,&b,&c,&d)
using namespace std;
//set<int >st[200005];
//set<int >st;
vector<int >v;
int dp[100005];
//bool vis[200005];
//map<int ,int >mp;
//map<int ,int >:: iterator it;
//set<ll >::iterator it;
//vector<pii>vp;
//priority_queue<int, vector<int>, greater<int> >pq;
//vector< pair <int ,pii > >vpp;
/********************************************* YOUR CODE GOES FROM HERE ************************************************/
void sieve(int n)
{
    bool prime[n+1];
    memset(prime, true, sizeof(prime));

    for (int p=2; p*p<=n; p++)
    {
        if (prime[p] == true)
        {
            for (int i=p*2; i<=n; i += p)
                prime[i] = false;
        }
    }
    for (int p=2; p<=n; p++)
       if (prime[p])
           v.pb(p);
}
int main()
{
    //ios_base::sync_with_stdio(false);cin.tie(0);
	//freopen("input.txt","r",stdin);
    //freopen("output.txt","w",stdout);
    dp[1]=1;
    dp[2]=1;
    dp[3]=1;
    dp[4]=2;
    for(int i=5;i<=40;i++)
        dp[i]=dp[i-1]+dp[i-4];
    sieve(dp[40]);
    sort(all(v));
    int t,n,ans;
    inp(t);
    while(t--)
    {
       inp(n);
       ans=upper_bound(all(v),dp[n])-v.begin();
       cout<<ans<<"\n";
    }
}
