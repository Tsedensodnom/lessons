using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace NewsApp.Views.Models
{
    public class PageListingModel
    {
        public ObservableCollection<PostItemModel> ItemsSource { get; set; }

        private bool isLoading = false;

        public PageListingModel()
        {
            ItemsSource = new ObservableCollection<PostItemModel>();
        }

        public void Fetch(bool clearOldItems = false)
        {
            if (!isLoading)
            {
                if (clearOldItems)
                {
                    ItemsSource.Clear();
                }

                isLoading = true;
                using (var httpClient = new HttpClient())
                {
                    var content = httpClient.GetStringAsync("http://192.168.0.100/feed.json").Result;
                    if (content != null && content.Length > 0)
                    {
                        var obj = JsonConvert.DeserializeObject<JObject>(content);
                        var list = obj.GetValue("articles").ToObject<List<PostItemModel>>();
                        
                        foreach (var item in list)
                        {
                            ItemsSource.Add(item);
                        }
                    }
                }
                isLoading = false;
            }
        }
    }
}
