using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace NewsApp.Views
{
    public class PageMaster : MasterDetailPage
    {
        public PageMaster()
        {
            Master = new PageMenu();
            Detail = App.Nav;
        }
    }
}
