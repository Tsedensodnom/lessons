using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace NewsApp.Views.Models
{
    public class MenuItemModel
    {
        public string Title { get; set; }
        public string Icon { get; set; }
        public Command Command { get; set; }
    }
}
