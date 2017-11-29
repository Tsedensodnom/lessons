using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NewsApp.Views.Models
{
    public class PostItemModel : INotifyPropertyChanged
    {
        private string _image;

        [JsonProperty(PropertyName = "title")]
        public string Title { get; set; }
        [JsonProperty(PropertyName = "description")]
        public string Description { get; set; }

        [JsonProperty(PropertyName = "url")]
        public string Url { get; set; }

        [JsonProperty(PropertyName = "urlToImage")]
        public string Image {
            get => _image;
            set
            {
                _image = value;
                OnPropertyChanged("Image");
                OnPropertyChanged("HasImage");
            }
        }

        public string TitleShort
        {
            get
            {
                if (Title != null && Title.Length > 100)
                {
                    return Title.Substring(0, 100) + "...";
                }
                return Title;
            }
        }

        public bool HasImage {
            get => _image != null;
        }

        public event PropertyChangedEventHandler PropertyChanged;
        protected virtual void OnPropertyChanged(string propertyName) => PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyName));
    }
}
